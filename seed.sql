

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
);

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_category` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `product_info` text NOT NULL,
  `stocks` int(255) NOT NULL,
  `price` int(255) NOT NULL
);

CREATE TABLE `purchase_history` (
  `id` int(11) NOT NULL,
  `products` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` varchar(255) NOT NULL,
  `date_bought` datetime NOT NULL,
  `transaction_id` varchar(255) NOT NULL
);

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `issue` varchar(255) NOT NULL,
  `date_issued` datetime DEFAULT NULL,
  `date_resolved` datetime DEFAULT NULL,
  `status_update` varchar(255) NOT NULL
);



ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `purchase_history`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

ALTER TABLE `purchase_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

INSERT INTO `products` (`id`, `product_name`, `product_category`, `image`, `product_info`, `stocks`, `price`) VALUES
(3, 'DDR4 4GB 2400MHz', 'RAM', 'RAM-KINGSTON-4GB-2400MHZ-FURY-BLK-HX424C15FB4-1.jpg', 'Random Access Memory', 123, 1000),
(5, 'DDR4 8GB 3200MHz', 'RAM', 'kingston_hyperx_fury_8gb_ddr4_3200mhz_rgb_01_l.jpg', 'Random Access Memory', 42, 2500),
(6, '80mm 8cm DC12V Brushless Computer PC Case Cooler Fan', 'Cooling Fan', '6d99cd299f0221ed14499b14c1d51669.jpg', 'Cooling Fan ', 48, 120),
(7, 'Aluminum Laptop Stand', 'Laptop Stand', 'Z21-Aluminum-Alloy-Multi-angle-Adjustable-Laptop-Stand-Notebook-Desktop-Bracket-05082020-01-p.jpg', 'Laptop Stand', 100, 235),
(8, '1 Meter Micro HDMI to HDMI 2.0', 'Cable', 'a649820ef577a06ec1f0460ac4394418.jpg', 'Micro HDMI to HDMI 2.0', 12, 320),
(10, '1 Meter HDMI Extension Cable', 'Cable', 'c21a5dd89de3f50e504cda79a6016e5a.jpg', 'HDMI Extension Cable', 11, 350),
(11, '250GB Solid State Drive', 'SSD', 'ssd.jpg', 'Solid State Drive', 12, 1500);

INSERT INTO `purchase_history` (`id`, `products`, `qty`, `total`, `date_bought`, `transaction_id`) VALUES
(26, 'DDR4 8GB 3200MHz', 1, '2500', '2022-01-07 12:56:06', '4DN18105W50029904'),
(27, 'DDR4 8GB 3200MHz', 2, '5000', '2022-01-07 12:58:13', '9HF532108D857383J'),
(28, '250GB Solid State Drive', 2, '3000', '2022-01-07 12:58:46', '6KD61102S0359942L'),
(29, 'DDR4 4GB 2400MHz', 1, '1000', '2022-01-07 01:11:10', '7RB46919R0001530M'),
(30, '80mm 8cm DC12V Brushless Computer PC Case Cooler Fan', 3, '360', '2022-01-07 01:12:29', '7K470667KN594241R'),
(31, '1 Meter Micro HDMI to HDMI 2.0', 2, '640', '2022-01-07 01:14:53', '1B096051BB767623E'),
(32, 'DDR4 4GB 2400MHz', 2, '2000', '2022-01-07 06:04:43', '4VV05363JE481211D');

INSERT INTO `ticket` (`id`, `name`, `email`, `subject`, `issue`, `date_issued`, `date_resolved`, `status_update`) VALUES
(1, 'Gerard', 'admin@example.com', 'tester', 'tqwrqwrwqqr', '2021-03-27 02:30:34', '2021-03-27 02:31:33', 'Resolved'),
(2, 'Julius', 'julius@sample.com', 'Trial', 'This is a trial message', '2021-03-27 08:03:14', '2021-03-27 08:03:28', 'Resolved'),
(3, 'Mark', 'mark@sample.com', 'Amber', 'Give me C6 amber', '2021-03-27 08:04:56', '2021-03-27 08:05:33', 'Resolved'),
(5, 'Frannz', 'Test', 'test', 'test', '2021-12-16 09:10:42', NULL, 'In Queue'),
(7, 'none', 'none@email.com', 'i dont know ', 'There has been a hardware issue that i cannot turn on the computer.', '2022-01-09 07:30:56', NULL, 'In Queue');
