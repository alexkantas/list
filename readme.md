# List 

To Do List Application created in custom MVC PHP and components from SemanticUI CSS Framework

![todo2](https://user-images.githubusercontent.com/7612837/60062015-120ac280-9700-11e9-8f75-4e46dcb27dce.PNG)

## Run the project

Create the following SQL table

```sql
CREATE TABLE `notification` (
	`id` TINYINT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` TINYTEXT NOT NULL,
	`description` TEXT NULL,
	`completed` BIT(1) NOT NULL DEFAULT b'0',
	`dateAdded` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
)
```

Authenticate your acound by adding a cookie with `key` and `value` based on `data\alexkey.php`

Ⓒ 2017 - Alex Kantas