# yii2-react-webpack-babel-docker
Yii2 + ReactJs + Webpack + Babel web environment with Docker  
(+ bootstrap 4 (scss) with easy customization)

Dockerized: nginx, php7.3 (with nodejs 12.5 and composer inside), mailtrap

You may use the repo to set up environment in few minutes  
Run docker-compose to up services
```bash
$ docker-compose up -d
```
Install composer dependencies
```bash
$ docker-compose exec php composer install
```
Install npm dependencies (react, babel, gulp, webpack)
```bash
$ docker-compose exec php npm install
```
Run gulp to build the project (react jsx files, scss bootstrap etc)
```
$ docker-compose exec php npm run build
```
If I haven't forgot anything, now you may enjoy your project is up!
