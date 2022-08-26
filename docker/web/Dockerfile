# FROM httpd:2.4.51

# # Apache の設定ファイルを配置
# # COPY ./docker/web/httpd-original.conf /etc/httpd/conf/httpd.conf
# # COPY ./docker/web/httpd-original.conf /usr/local/apache2/conf/httpd.conf
# COPY ./docker/web/my-httpd.conf /usr/local/apache2/conf/httpd.conf
# # COPY ./docker/web/index.html /var/www/html/index.html
# COPY ./docker/web/vhost.conf /usr/local/apache2/conf/vhosts/vhost.conf

# # Apache の起動
# WORKDIR /var/www/html/public

# CMD ["httpd-foreground"]

FROM nginx:1.19-alpine