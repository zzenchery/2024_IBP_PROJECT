CREATE TABLE `admin_accounts`
(
    `id`         int(25) NOT NULL,
    `user_name`  varchar(50)  NOT NULL,
    `password`   varchar(255) NOT NULL,
    `admin_type` varchar(10)  NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `admin_accounts` (`id`, `user_name`, `password`, `admin_type`)
VALUES (1, 'superadmin', '$2y$10$eo7.w0Ttuy8mOBMvDlGqDeewQERkXu//7qO3jXp5NC76LwfAZpNrO', 'super'),
       (2, 'admin', '$2y$10$RnDwpen5c8.gtZLaxHEHDOKWY77t/20A4RRkWBsjlPuu7Wmy0HyBu', 'admin');

CREATE TABLE `series`
(
    `id`          int(10) NOT NULL,
    `director`      varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    `name`        varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    `type`        varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    `comment` varchar(512) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
    `created_at`  timestamp NULL DEFAULT NULL,
    `updated_at`  timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `series` (`id`, `director`, `name`, `type`, `comment`, `created_at`, `updated_at`)
VALUES (1, 'Vince Gilligan', 'Breaking Bad', 'Crime',
        'I love it so much.The show is so intense! I cant stop watching it!',
        '2018-05-10 18:10:30', '2018-05-10 18:10:40'),
       (2, 'Jesse Armstrong', 'Succession', 'Drama',
        'Such an interesting family hahaa i would totally recommend watching it!', '21-10-01 11:46:45',
        '2021-10-01 11:46:53');

ALTER TABLE `admin_accounts`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

ALTER TABLE `series`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `admin_accounts`
    MODIFY `id` int (25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `series`
    MODIFY `id` int (10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;