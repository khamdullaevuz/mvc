CREATE TABLE `products` (
    `id` int(10) NOT NULL,
    `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `products` (`id`, `name`) VALUES
  (1, 'Apple'),
  (2, 'Orange');

ALTER TABLE `products`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `products`
    MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;