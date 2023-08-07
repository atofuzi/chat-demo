const express = require('express');
const http = require('http');
require('dotenv').config();
const socketIo = require('socket.io');

const app = express();
const server = http.Server(app);

const io = socketIo(server, {
  cors: {
    origin: "http://localhost:8007",
    credentials: true
  }
});

const PORT = process.env.BROADCAST_PORT;

app.get('/', (req, res) => {
  res.sendFile(__dirname + '/index.html');
})

server.listen(PORT, () => {
  console.log(`listening on port ${PORT}`);
});

const redisPort = process.env.REDIS_PORT;
const redisHost = process.env.REDIS_HOST;

console.log(redisPort);
console.log(redisHost);

const ioRedis = require('ioredis');

const redis = ioRedis.createClient({
  host: redisHost,
  port: redisPort,
  password: null
});

redis.subscribe('action-channel-one');

redis.on('message', (channel, message) => {
  const data = JSON.parse(message);
  const msg = data.data.actionData;
  io.emit('receiveMessage', msg);
});


io.on('connection', (socket) => {
  console.log('user connected');

  const count = io.engine.clientsCount;
  console.log(count);
  const count2 = io.of("/").sockets.size;
  console.log(count2);
  // 公式サンプルコード
  socket.on("hello", (arg, callback) => {
    console.log(arg); // "world"
    callback("got it");
  });

  socket.on('sendMessage', (message) => {
    console.log('Message has been sent: ', message);

    io.emit('receiveMessage', message);
    //socket.broadcast.emit('receiveMessage', message);
  });

  // to all connected clients
  io.emit("hello1", "hello1");
});