ALTER TABLE `item` ADD `bill_status` INT NOT NULL DEFAULT '2' COMMENT '1=genrated,2=pending' AFTER `is_deleted`;


ALTER TABLE `mst_user` CHANGE `updated_by` `updated_by` VARCHAR(50) NOT NULL;


ALTER TABLE `item` ADD `invoice_no` VARCHAR(100) NULL AFTER `bill_status`;


ALTER TABLE `party` ADD `pan_no` VARCHAR(20) NOT NULL AFTER `gst_no`;


ALTER TABLE `party` CHANGE `address` `address` VARCHAR(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `pan_no` `pan_no` VARCHAR(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL;


ALTER TABLE `item` ADD `custom_created_at` DATE NULL AFTER `hsn_id`;


ALTER TABLE `item` ADD `state_code` VARCHAR(100) NOT NULL AFTER `invoice_no`;


ALTER TABLE `item` CHANGE `state_code` `state_code` VARCHAR(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL;

ALTER TABLE `invoice` ADD `party_id` TEXT NULL AFTER `pdf_name`;

ALTER TABLE `invoice` ADD `custom_genrated_date` DATE NULL AFTER `party_id`;


ALTER TABLE `invoice` ADD `bill_type` VARCHAR(100) NOT NULL AFTER `custom_genrated_date`;

ALTER TABLE `invoice` CHANGE `bill_type` `bill_type` VARCHAR(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL;

ALTER TABLE `invoice` CHANGE `custom_genrated_date` `custom_genrated_date` DATETIME NULL DEFAULT NULL;


