ALTER TABLE `item` ADD `bill_status` INT NOT NULL DEFAULT '2' COMMENT '1=genrated,2=pending' AFTER `is_deleted`;


ALTER TABLE `mst_user` CHANGE `updated_by` `updated_by` VARCHAR(50) NOT NULL;


ALTER TABLE `item` ADD `invoice_no` VARCHAR(100) NULL AFTER `bill_status`;