ALTER TABLE `item` ADD `bill_status` INT NOT NULL DEFAULT '2' COMMENT '1=genrated,2=pending' AFTER `is_deleted`;


ALTER TABLE `mst_user` CHANGE `updated_by` `updated_by` VARCHAR(50) NOT NULL;


ALTER TABLE `item` ADD `invoice_no` VARCHAR(100) NULL AFTER `bill_status`;


ALTER TABLE `party` ADD `pan_no` VARCHAR(20) NOT NULL AFTER `gst_no`;


ALTER TABLE `party` CHANGE `address` `address` VARCHAR(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `pan_no` `pan_no` VARCHAR(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL;


ALTER TABLE `item` ADD `custom_created_at` DATE NULL AFTER `hsn_id`;


