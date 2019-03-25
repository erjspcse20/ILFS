ALTER TABLE `item` ADD `gst_type` INT NOT NULL COMMENT '1=igst,2=sgst &cgst' AFTER `igst`, ADD `total_igst_calculated` DOUBLE NOT NULL AFTER `gst_type`, ADD `total_sgst_calculated` DOUBLE NOT NULL AFTER `total_igst_calculated`, ADD `total_cgst_calculated` DOUBLE NOT NULL AFTER `total_sgst_calculated`;

ALTER TABLE `item` ADD `total_gst` FLOAT NOT NULL AFTER `transport_charge`;



ALTER TABLE `item` CHANGE `a_inc` `a_inc` INT(11) NOT NULL AUTO_INCREMENT, CHANGE `party_id` `party_id` VARCHAR(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL, CHANGE `product_id` `product_id` VARCHAR(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL, CHANGE `hsn_id` `hsn_id` VARCHAR(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL, CHANGE `created_at` `created_at` DATETIME NULL DEFAULT NULL, CHANGE `created_by` `created_by` VARCHAR(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL, CHANGE `updated_at` `updated_at` DATETIME NULL DEFAULT NULL, CHANGE `updated_by` `updated_by` VARCHAR(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL, CHANGE `type` `type` VARCHAR(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `quantity` `quantity` INT(11) NULL, CHANGE `rate` `rate` DOUBLE NULL, CHANGE `calculated_amount` `calculated_amount` DOUBLE NULL, CHANGE `category` `category` VARCHAR(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `transport_charge` `transport_charge` DOUBLE NULL, CHANGE `total_gst` `total_gst` FLOAT NULL, CHANGE `sgst` `sgst` FLOAT NULL, CHANGE `cgst` `cgst` FLOAT NULL, CHANGE `igst` `igst` FLOAT NULL, CHANGE `gst_type` `gst_type` INT(11) NULL COMMENT '1=igst,2=sgst &cgst', CHANGE `total_igst_calculated` `total_igst_calculated` DOUBLE NULL, CHANGE `total_sgst_calculated` `total_sgst_calculated` DOUBLE NULL, CHANGE `total_cgst_calculated` `total_cgst_calculated` DOUBLE NULL, CHANGE `amount_with_tax` `amount_with_tax` DOUBLE NULL, CHANGE `dimension` `dimension` VARCHAR(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `vahical_no` `vahical_no` VARCHAR(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `gp_no` `gp_no` VARCHAR(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `party_gst_no` `party_gst_no` VARCHAR(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `state_of_supply` `state_of_supply` VARCHAR(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `mode_of_payment` `mode_of_payment` VARCHAR(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `recived_amount` `recived_amount` DOUBLE NULL, CHANGE `rest_amount` `rest_amount` DOUBLE NULL;



ALTER TABLE `item` ADD `is_deleted` BOOLEAN NOT NULL AFTER `rest_amount`;

ALTER TABLE `item` ADD `item_published_id` VARCHAR(100) NOT NULL AFTER `is_deleted`;

ALTER TABLE `item` CHANGE `a_inc` `a_inc` BIGINT(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `party` ADD `gst_no` VARCHAR(20) NULL AFTER `address`;
