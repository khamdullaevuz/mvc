# mvc
### simple mvc project
# Usage
## Using git (for usage and contribute)
### Clone repository
```shell
git clone https://github.com/khamdullaevuz/mvc
```
### Dump autoloader
```shell
composer dump-autoload
```
## Using composer (for usage)
### Create project
```shell
composer create-project khamdullaevuz/mvc:dev-main
```
## Configure
### Make config
```shell
php do make:config
```
#### and change config file `config/Core.php`

### Make controller
```shell
php do make:controller TestController
```

### Make model
```shell
php do make:model Test
```

### Make migration
```shell
php do make:migration Products
```

### Migration up
```shell
php do migrate:up
```

### Migration down
```shell
php do migrate:down
```

### Run server
#### with default port (8000)
```shell
php do serve
```
#### and visit [localhost:8000](http://localhost:8000)
#### with custom port
```shell
php do serve 9000
```
#### and visit [localhost:9000](http://localhost:9000)