const express = require('express');
const http = require('http');

const socketIo = require('socket.io');

const app = express();
const server = http.Server(app);

const io = socketIo(server, {
  cors: {
    origin: "http://localhost:8087",
    credentials: true
  }
});

const PORT = 3000;

app.get('/', (req, res) => {
  res.sendFile(__dirname + '/index.html');
})

server.listen(PORT, () => {
  console.log(`listening on port ${PORT}`);
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