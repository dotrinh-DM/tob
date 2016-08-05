ALTER TABLE `tbl_images`
ADD COLUMN `liked`  tinyint(11) NOT NULL DEFAULT 0 AFTER `link`,
ADD COLUMN `viewed`  tinyint(11) NOT NULL DEFAULT 0 AFTER `liked`;
ADD COLUMN `vote`  tinyint(11) NOT NULL DEFAULT 0 AFTER `viewed`;