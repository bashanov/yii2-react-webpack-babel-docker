# yii2-react-webpack-babel-docker
Yii2 + ReactJs + Webpack + Babel web environment with Docker

Use may use the repo to set up environment in few minutes  
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
