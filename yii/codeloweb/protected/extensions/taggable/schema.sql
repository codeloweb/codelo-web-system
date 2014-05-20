/* Tag table */
CREATE TABLE `tag` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `count` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `tag_name` (`name`)
);

/* Tag binding table */
CREATE TABLE `article_tag` (
  `article_id` INT(10) UNSIGNED NOT NULL,
  `tag_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY  (`article_id`,`tag_id`)
);