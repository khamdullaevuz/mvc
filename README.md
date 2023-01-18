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

### Make controller
```shell
php do make:controller TestController
```

### Make model
```shell
php do make:model Test
```

### Run server
#### with default port (8000)
```shell
php do serve
```
#### with custom port
```shell
php do serve 9000
```