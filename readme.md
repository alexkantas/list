# List 

## MYSQL Table

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


Ⓒ 2017