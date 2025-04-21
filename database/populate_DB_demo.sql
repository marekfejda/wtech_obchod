DROP TABLE IF EXISTS order_products;
DROP TABLE IF EXISTS orders;
DROP TABLE IF EXISTS product_images;
DROP TABLE IF EXISTS images;
DROP TABLE IF EXISTS products;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS brands;
DROP TABLE IF EXISTS colors;
DROP TABLE IF EXISTS categories;

CREATE TABLE brands (
  id SERIAL PRIMARY KEY,
  brand VARCHAR NOT NULL
);

CREATE TABLE colors (
  id SERIAL PRIMARY KEY,
  color VARCHAR NOT NULL
);

CREATE TABLE categories (
  id SERIAL PRIMARY KEY,
  category VARCHAR NOT NULL,
  icon VARCHAR NOT NULL,
  slug VARCHAR NOT NULL
);

CREATE TABLE products (
  id SERIAL PRIMARY KEY,
  name VARCHAR NOT NULL,
  brand_id INTEGER NOT NULL REFERENCES Brands(id),
  category_id INTEGER NOT NULL REFERENCES Categories(id),
  color_id INTEGER NOT NULL REFERENCES Colors(id),
  price FLOAT NOT NULL,
  stockQuantity INTEGER NOT NULL,
  short_description TEXT,
  description TEXT,
  created_at TIMESTAMP NOT NULL DEFAULT NOW(),
  updated_at TIMESTAMP NOT NULL DEFAULT NOW()
);

CREATE TABLE images (
  uid SERIAL PRIMARY KEY,
  path VARCHAR NOT NULL
);

CREATE TABLE product_images (
  product_id INTEGER NOT NULL REFERENCES Products(id),
  image_id INTEGER NOT NULL REFERENCES Images(uid),
  PRIMARY KEY (product_id, image_id)
);

CREATE TABLE users (
  id SERIAL PRIMARY KEY,
  username VARCHAR NOT NULL,
  role VARCHAR NOT NULL,
  email VARCHAR NOT NULL UNIQUE,
  password VARCHAR NOT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT NOW()
);

CREATE TABLE orders (
  id SERIAL PRIMARY KEY,
  user_id INTEGER NOT NULL REFERENCES Users(id),
  name_surname VARCHAR NOT NULL,
  address_streetnumber VARCHAR NOT NULL,
  "PSC" VARCHAR NOT NULL,
  city_country VARCHAR NOT NULL,
  phone_number VARCHAR NOT NULL,
  email VARCHAR NOT NULL,
  payment_type VARCHAR NOT NULL,
  card_number BIGINT,
  exp_date VARCHAR,
  cvc INT,
  card_holder VARCHAR,
  state VARCHAR,
  created_at TIMESTAMP NOT NULL DEFAULT NOW()
);

CREATE TABLE order_products (
  order_id INTEGER NOT NULL REFERENCES Orders(id),
  product_id INTEGER NOT NULL REFERENCES Products(id),
  amount INTEGER NOT NULL,
  PRIMARY KEY (order_id, product_id)
);

INSERT INTO Brands (brand) VALUES
  ('Apple'),
  ('Marshall'),
  ('JBL');

INSERT INTO Categories (category, icon, slug) VALUES
  ('iPhone', 'phone', 'iphone'),
  ('Macbook', 'laptop', 'macbook'),
  ('iPad', 'tablet', 'ipad'),
  ('Audio', 'headphones', 'audio');

INSERT INTO Colors (color) VALUES
  ('Black'),
  ('White'),
  ('Blue'),
  ('Green'),
  ('Red'),
  ('Pink'),
  ('Yellow'),
  ('Gray'),
  ('Purple'),
  ('Brown');

INSERT INTO Users (username, role, email, password) VALUES
  ('James Bond', 'user', 'jamesbond@gmail.com', '12345'),
  ('Picklemaster', 'user', 'picklemaster@gmail.com','12345'),
  ('admin', 'admin', 'admin@ishop.com', '12345');

INSERT INTO Products (name, brand_id, category_id, color_id, price, stockQuantity, short_description, description) VALUES
  -- iPhone 15
  ('iPhone 15 Black', 1, 1, 1, 899.99, 99, '6,1" Super Retina XDR OLED, RAM 6 GB, ROM 256 GB', 'Mobilný telefón - 6,1" Super Retina XDR OLED 2556 x 1179, operačná pamäť 6 GB, vnútorná pamäť 256 GB, single SIM + eSIM, procesor Apple A16 Bionic, fotoaparát: 48 Mpx (f/1,6) hlavný + 12 Mpx širokouhlý, predná kamera 12 Mpx, GPS, NFC, LTE, 5G, USB-C, vodoodolný podľa IP68, rýchle nabíjanie 20 W, bezdrôtové nabíjanie 15 W, model 2023, iOS'),
  ('iPhone 15 Blue', 1, 1, 3, 899.99, 99, '6,1" Super Retina XDR OLED, RAM 6 GB, ROM 256 GB', 'Mobilný telefón - 6,1" Super Retina XDR OLED 2556 x 1179, operačná pamäť 6 GB, vnútorná pamäť 256 GB, single SIM + eSIM, procesor Apple A16 Bionic, fotoaparát: 48 Mpx (f/1,6) hlavný + 12 Mpx širokouhlý, predná kamera 12 Mpx, GPS, NFC, LTE, 5G, USB-C, vodoodolný podľa IP68, rýchle nabíjanie 20 W, bezdrôtové nabíjanie 15 W, model 2023, iOS'),
  ('iPhone 15 Pink', 1, 1, 6, 899.99, 99, '6,1" Super Retina XDR OLED, RAM 6 GB, ROM 256 GB', 'Mobilný telefón - 6,1" Super Retina XDR OLED 2556 x 1179, operačná pamäť 6 GB, vnútorná pamäť 256 GB, single SIM + eSIM, procesor Apple A16 Bionic, fotoaparát: 48 Mpx (f/1,6) hlavný + 12 Mpx širokouhlý, predná kamera 12 Mpx, GPS, NFC, LTE, 5G, USB-C, vodoodolný podľa IP68, rýchle nabíjanie 20 W, bezdrôtové nabíjanie 15 W, model 2023, iOS'),
  ('iPhone 15 Green', 1, 1, 4, 899.99, 99, '6,1" Super Retina XDR OLED, RAM 6 GB, ROM 256 GB', 'Mobilný telefón - 6,1" Super Retina XDR OLED 2556 x 1179, operačná pamäť 6 GB, vnútorná pamäť 256 GB, single SIM + eSIM, procesor Apple A16 Bionic, fotoaparát: 48 Mpx (f/1,6) hlavný + 12 Mpx širokouhlý, predná kamera 12 Mpx, GPS, NFC, LTE, 5G, USB-C, vodoodolný podľa IP68, rýchle nabíjanie 20 W, bezdrôtové nabíjanie 15 W, model 2023, iOS'),
  ('iPhone 15 Yellow', 1, 1, 7, 899.99, 99, '6,1" Super Retina XDR OLED, RAM 6 GB, ROM 256 GB', 'Mobilný telefón - 6,1" Super Retina XDR OLED 2556 x 1179, operačná pamäť 6 GB, vnútorná pamäť 256 GB, single SIM + eSIM, procesor Apple A16 Bionic, fotoaparát: 48 Mpx (f/1,6) hlavný + 12 Mpx širokouhlý, predná kamera 12 Mpx, GPS, NFC, LTE, 5G, USB-C, vodoodolný podľa IP68, rýchle nabíjanie 20 W, bezdrôtové nabíjanie 15 W, model 2023, iOS'),
  -- iPhone 15 Pro
  ('iPhone 15 Pro Natural', 1, 1, 8, 1099.99, 99, '6,1" Super Retina XDR OLED (120Hz), RAM 8 GB, ROM 128 GB', 'Mobilný telefón - 6,1" Super Retina XDR OLED 2556 x 1179 (120Hz), operačná pamäť 8 GB, vnútorná pamäť 128 GB, single SIM + eSIM, procesor Apple A17 Pro, fotoaparát: 48Mpx (f/1,8) hlavný + 12Mpx širokouhlý + 12Mpx teleobjektív, predná kamera 12Mpx, GPS, NFC, LTE, 5G, USB-C, vodoodolný podľa IP68, rýchle nabíjanie, bezdrôtové nabíjanie 15W, model 2023, iOS'),
  ('iPhone 15 Pro Blue', 1, 1, 3, 1099.99, 99, '6,1" Super Retina XDR OLED (120Hz), RAM 8 GB, ROM 128 GB', 'Mobilný telefón - 6,1" Super Retina XDR OLED 2556 x 1179 (120Hz), operačná pamäť 8 GB, vnútorná pamäť 128 GB, single SIM + eSIM, procesor Apple A17 Pro, fotoaparát: 48Mpx (f/1,8) hlavný + 12Mpx širokouhlý + 12Mpx teleobjektív, predná kamera 12Mpx, GPS, NFC, LTE, 5G, USB-C, vodoodolný podľa IP68, rýchle nabíjanie, bezdrôtové nabíjanie 15W, model 2023, iOS'),
  -- iPhone 16
  ('iPhone 16 Black', 1, 1, 1, 999.99, 99, '6,1" Super Retina XDR OLED, RAM 8 GB, ROM 128 GB', 'Mobilný telefón - 6,1" Super Retina XDR OLED 2556 x 1179, operačná pamäť 8 GB, vnútorná pamäť 128 GB, single SIM + eSIM, procesor Apple A18 Bionic, fotoaparát: 48 Mpx (f/1,6) hlavný + 12 Mpx širokouhlý, GPS, NFC, LTE, 5G, USB-C, vodoodolný podľa IP68, rýchle nabíjanie, bezdrôtové nabíjanie 15 W, batéria 3561 mAh, model 2024, iOS'),
  ('iPhone 16 White', 1, 1, 2, 999.99, 99, '6,1" Super Retina XDR OLED, RAM 8 GB, ROM 128 GB', 'Mobilný telefón - 6,1" Super Retina XDR OLED 2556 x 1179, operačná pamäť 8 GB, vnútorná pamäť 128 GB, single SIM + eSIM, procesor Apple A18 Bionic, fotoaparát: 48 Mpx (f/1,6) hlavný + 12 Mpx širokouhlý, GPS, NFC, LTE, 5G, USB-C, vodoodolný podľa IP68, rýchle nabíjanie, bezdrôtové nabíjanie 15 W, batéria 3561 mAh, model 2024, iOS'),
  ('iPhone 16 Blue', 1, 1, 3, 999.99, 99, '6,1" Super Retina XDR OLED, RAM 8 GB, ROM 128 GB', 'Mobilný telefón - 6,1" Super Retina XDR OLED 2556 x 1179, operačná pamäť 8 GB, vnútorná pamäť 128 GB, single SIM + eSIM, procesor Apple A18 Bionic, fotoaparát: 48 Mpx (f/1,6) hlavný + 12 Mpx širokouhlý, GPS, NFC, LTE, 5G, USB-C, vodoodolný podľa IP68, rýchle nabíjanie, bezdrôtové nabíjanie 15 W, batéria 3561 mAh, model 2024, iOS'),
  ('iPhone 16 Pink', 1, 1, 6, 999.99, 99, '6,1" Super Retina XDR OLED, RAM 8 GB, ROM 128 GB', 'Mobilný telefón - 6,1" Super Retina XDR OLED 2556 x 1179, operačná pamäť 8 GB, vnútorná pamäť 128 GB, single SIM + eSIM, procesor Apple A18 Bionic, fotoaparát: 48 Mpx (f/1,6) hlavný + 12 Mpx širokouhlý, GPS, NFC, LTE, 5G, USB-C, vodoodolný podľa IP68, rýchle nabíjanie, bezdrôtové nabíjanie 15 W, batéria 3561 mAh, model 2024, iOS'),
  ('iPhone 16 Green', 1, 1, 4, 999.99, 99, '6,1" Super Retina XDR OLED, RAM 8 GB, ROM 128 GB', 'Mobilný telefón - 6,1" Super Retina XDR OLED 2556 x 1179, operačná pamäť 8 GB, vnútorná pamäť 128 GB, single SIM + eSIM, procesor Apple A18 Bionic, fotoaparát: 48 Mpx (f/1,6) hlavný + 12 Mpx širokouhlý, GPS, NFC, LTE, 5G, USB-C, vodoodolný podľa IP68, rýchle nabíjanie, bezdrôtové nabíjanie 15 W, batéria 3561 mAh, model 2024, iOS'),
  -- iPhone 16 Pro
  ('iPhone 16 Pro Black', 1, 1, 1, 1199.99, 99, '6,3" Super Retina XDR OLED (120 Hz), RAM 8 GB, ROM 256 GB', 'Mobilný telefón - 6,3" Super Retina XDR OLED 2622 x 1206 (120 Hz), operačná pamäť 8 GB, vnútorná pamäť 256 GB, single SIM + eSIM, procesor Apple A18 Pro, fotoaparát: 48 Mpx (f/1,78) hlavný + 48 Mpx širokouhlý + 12 Mpx teleobjektív, predná kamera 12 Mpx, GPS, NFC, LTE, 5G, USB-C, vodoodolný podľa IP68, rýchle nabíjanie, bezdrôtové nabíjanie 25 W, batéria 3582 mAh, model 2024, iOS'),
  ('iPhone 16 Pro White', 1, 1, 2, 1199.99, 99, '6,3" Super Retina XDR OLED (120 Hz), RAM 8 GB, ROM 256 GB', 'Mobilný telefón - 6,3" Super Retina XDR OLED 2622 x 1206 (120 Hz), operačná pamäť 8 GB, vnútorná pamäť 256 GB, single SIM + eSIM, procesor Apple A18 Pro, fotoaparát: 48 Mpx (f/1,78) hlavný + 48 Mpx širokouhlý + 12 Mpx teleobjektív, predná kamera 12 Mpx, GPS, NFC, LTE, 5G, USB-C, vodoodolný podľa IP68, rýchle nabíjanie, bezdrôtové nabíjanie 25 W, batéria 3582 mAh, model 2024, iOS'),
  ('iPhone 16 Pro Desert', 1, 1, 7, 1199.99, 99, '6,3" Super Retina XDR OLED (120 Hz), RAM 8 GB, ROM 256 GB', 'Mobilný telefón - 6,3" Super Retina XDR OLED 2622 x 1206 (120 Hz), operačná pamäť 8 GB, vnútorná pamäť 256 GB, single SIM + eSIM, procesor Apple A18 Pro, fotoaparát: 48 Mpx (f/1,78) hlavný + 48 Mpx širokouhlý + 12 Mpx teleobjektív, predná kamera 12 Mpx, GPS, NFC, LTE, 5G, USB-C, vodoodolný podľa IP68, rýchle nabíjanie, bezdrôtové nabíjanie 25 W, batéria 3582 mAh, model 2024, iOS'),
  ('iPhone 16 Pro Natural', 1, 1, 8, 1199.99, 99, '6,3" Super Retina XDR OLED (120 Hz), RAM 8 GB, ROM 256 GB', 'Mobilný telefón - 6,3" Super Retina XDR OLED 2622 x 1206 (120 Hz), operačná pamäť 8 GB, vnútorná pamäť 256 GB, single SIM + eSIM, procesor Apple A18 Pro, fotoaparát: 48 Mpx (f/1,78) hlavný + 48 Mpx širokouhlý + 12 Mpx teleobjektív, predná kamera 12 Mpx, GPS, NFC, LTE, 5G, USB-C, vodoodolný podľa IP68, rýchle nabíjanie, bezdrôtové nabíjanie 25 W, batéria 3582 mAh, model 2024, iOS'),
  -- Macbook Air M4 
  ('Macbook Air M4 Midnight', 1, 2, 1, 1459.99, 99, 'M4 (10-jadrový), 15,3" IPS lesklý, RAM 16 GB, SSD 256 GB', 'MacBook - Apple M4 (10-jadrový), 15,3" IPS lesklý 2880 x 1864 px, RAM 16 GB, Apple M4 10-jadrová GPU, SSD 256 GB podsvietená klávesnica, webkamera, čítačka odtlačkov prstov, WiFi 6E, Bluetooth, hmotnosť 1,51 kg, macOS'),
  ('Macbook Air M4 Silver', 1, 2, 8, 1459.99, 99, 'M4 (10-jadrový), 15,3" IPS lesklý, RAM 16 GB, SSD 256 GB', 'MacBook - Apple M4 (10-jadrový), 15,3" IPS lesklý 2880 x 1864 px, RAM 16 GB, Apple M4 10-jadrová GPU, SSD 256 GB podsvietená klávesnica, webkamera, čítačka odtlačkov prstov, WiFi 6E, Bluetooth, hmotnosť 1,51 kg, macOS'),
  ('Macbook Air M4 Sky Blue', 1, 2, 3, 1459.99, 99, 'M4 (10-jadrový), 15,3" IPS lesklý, RAM 16 GB, SSD 256 GB', 'MacBook - Apple M4 (10-jadrový), 15,3" IPS lesklý 2880 x 1864 px, RAM 16 GB, Apple M4 10-jadrová GPU, SSD 256 GB podsvietená klávesnica, webkamera, čítačka odtlačkov prstov, WiFi 6E, Bluetooth, hmotnosť 1,51 kg, macOS'),
  ('Macbook Air M4 Starlight', 1, 2, 7, 1459.99, 99, 'M4 (10-jadrový), 15,3" IPS lesklý, RAM 16 GB, SSD 256 GB', 'MacBook - Apple M4 (10-jadrový), 15,3" IPS lesklý 2880 x 1864 px, RAM 16 GB, Apple M4 10-jadrová GPU, SSD 256 GB podsvietená klávesnica, webkamera, čítačka odtlačkov prstov, WiFi 6E, Bluetooth, hmotnosť 1,51 kg, macOS'),
  -- Macbook Pro M4
  ('Macbook Pro M4 Black', 1, 2, 1, 2899.99, 99, 'M4 Pro (14-jadrový), 16,2" Liquid Retina XDR, 120 Hz, RAM 24 GB, SSD 512 GB', '  MacBook - Apple M4 Pro (14-jadrový), 16,2" Liquid Retina XDR lesklý 3456 x 2234 px, 120 Hz, RAM 24 GB, Apple M4 PRO 20-jadrová GPU, SSD 512 GB, podsvietená klávesnica, webkamera, čítačka odtlačkov prstov, WiFi 6, WiFi, Bluetooth, hmotnosť 2,14 kg, macOS'),
  ('Macbook Pro M4 Silver', 1, 2, 8, 2899.99, 99, 'M4 Pro (14-jadrový), 16,2" Liquid Retina XDR, 120 Hz, RAM 24 GB, SSD 512 GB', '  MacBook - Apple M4 Pro (14-jadrový), 16,2" Liquid Retina XDR lesklý 3456 x 2234 px, 120 Hz, RAM 24 GB, Apple M4 PRO 20-jadrová GPU, SSD 512 GB, podsvietená klávesnica, webkamera, čítačka odtlačkov prstov, WiFi 6, WiFi, Bluetooth, hmotnosť 2,14 kg, macOS'),
  -- iPad 2025 (11. generácia)
  ('iPad 2025 Silver', 1, 3, 8, 419.99, 99, '10,9" QHD Liquid Retina, A16 Bionic, RAM 6 GB, ROM 128 GB', 'Tablet - displej 10,9" QHD 2360 x 1640 Liquid Retina, Apple A16 Bionic, RAM 6 GB, kapacita úložiska 128 GB, WiFi, Bluetooth, GPS, bez podpory (iba WiFi), zadný fotoaparát 12 Mpx (f/1,8), predný fotoaparát 12 Mpx (f/2,4), USB-C, batéria 28,93 mAh, iPadOS 18'),
  ('iPad 2025 Blue', 1, 3, 3, 419.99, 99, '10,9" QHD Liquid Retina, A16 Bionic, RAM 6 GB, ROM 128 GB', 'Tablet - displej 10,9" QHD 2360 x 1640 Liquid Retina, Apple A16 Bionic, RAM 6 GB, kapacita úložiska 128 GB, WiFi, Bluetooth, GPS, bez podpory (iba WiFi), zadný fotoaparát 12 Mpx (f/1,8), predný fotoaparát 12 Mpx (f/2,4), USB-C, batéria 28,93 mAh, iPadOS 18'),
  ('iPad 2025 Pink', 1, 3, 6, 419.99, 99, '10,9" QHD Liquid Retina, A16 Bionic, RAM 6 GB, ROM 128 GB', 'Tablet - displej 10,9" QHD 2360 x 1640 Liquid Retina, Apple A16 Bionic, RAM 6 GB, kapacita úložiska 128 GB, WiFi, Bluetooth, GPS, bez podpory (iba WiFi), zadný fotoaparát 12 Mpx (f/1,8), predný fotoaparát 12 Mpx (f/2,4), USB-C, batéria 28,93 mAh, iPadOS 18'),
  ('iPad 2025 Yellow', 1, 3, 7, 419.99, 99, '10,9" QHD Liquid Retina, A16 Bionic, RAM 6 GB, ROM 128 GB', 'Tablet - displej 10,9" QHD 2360 x 1640 Liquid Retina, Apple A16 Bionic, RAM 6 GB, kapacita úložiska 128 GB, WiFi, Bluetooth, GPS, bez podpory (iba WiFi), zadný fotoaparát 12 Mpx (f/1,8), predný fotoaparát 12 Mpx (f/2,4), USB-C, batéria 28,93 mAh, iPadOS 18'),
  -- iPad Pro 
  ('iPad Pro 2024 Silver', 1, 3, 8, 1249.99, 99, '11" QHD Ultra Retina XDR, M4 s 10-jadrovou GPU, RAM 8 GB, ROM 256 GB', 'Tablet - displej 11" QHD 2420 x 1668 Ultra Retina XDR, Apple M4 s 10-jadrovou GPU, RAM 8 GB, kapacita úložiska 256 GB, WiFi, Bluetooth, NFC, OTG, bez podpory (iba WiFi), zadný fotoaparát 12 Mpx (f/1,8), predný fotoaparát 12 Mpx (f/2,4), USB-C, iPadOS 17'),
  ('iPad Pro 2024 Black', 1, 3, 1, 1249.99, 99, '11" QHD Ultra Retina XDR, M4 s 10-jadrovou GPU, RAM 8 GB, ROM 256 GB', 'Tablet - displej 11" QHD 2420 x 1668 Ultra Retina XDR, Apple M4 s 10-jadrovou GPU, RAM 8 GB, kapacita úložiska 256 GB, WiFi, Bluetooth, NFC, OTG, bez podpory (iba WiFi), zadný fotoaparát 12 Mpx (f/1,8), predný fotoaparát 12 Mpx (f/2,4), USB-C, iPadOS 17'),
  -- AirPods
  ('AirPods 4', 1, 4, 2, 143.99, 99, 'Bezdrôtové slúchadlá, IP54, výdrž batérie až 30 h','Bezdrôtové slúchadlá - s mikrofónom, True Wireless, kôstky, otvorená konštrukcia, Bluetooth 5.3, prepínanie skladieb, prijímanie hovorov, certifikácia IP54, výdrž batérie až 30 h (5 h+30 h)'),
  ('AirPods 4 s ANC', 1, 4, 2, 179.99, 99, 'Bezdrôtové slúchadlá, aktívne potlačenie hluku, výdrž batérie až 30 h','Bezdrôtové slúchadlá - s mikrofónom, True Wireless, kôstky, aktívne potlačenie hluku (ANC), uzatvorená konštrukcia, Bluetooth 5.3, Ambient sound, Hi-Res audio, hlasový asistent, prepínanie skladieb, prijímanie hovorov, certifikácia IP54, frekvenčný rozsah 20-20000 Hz, výdrž batérie až 30 h (5 h+25 h)'),
  ('AirPods 3', 1, 4, 2, 162.99, 99, 'Bezdrôtové slúchadlá, Bluetooth 5.0, certifikácia IPX4', 'Bezdrôtové slúchadlá - s mikrofónom, kôstky, Bluetooth 5.0, prepínanie skladieb, prijímanie hovorov, certifikácia IPX4'),
  ('AirPods Pro 2', 1, 4, 2, 259.99, 99, 'Bezdrôtové slúchadlá, aktívne potlačenie hluku, výdrž batérie až 30 h', 'Bezdrôtové slúchadlá - s mikrofónom, True Wireless, štuple, aktívne potlačenie hluku (ANC), uzatvorená konštrukcia, Bluetooth 5.3, prepínanie skladieb, prijímanie hovorov, s ovládaním hlasitosti, certifikácia IP54, výdrž batérie až 30 h (6 h+24 h)'),
  ('AirPods Max Blue', 1, 4, 3, 559.99, 99, 'Bezdrôtové slúchadlá, cez hlavu, aktívne potlačenie hluku, výdrž batérie až 20 h', 'Bezdrôtové slúchadlá - s mikrofónom, cez hlavu, okolo uší, aktívne potlačenie hluku (ANC), uzatvorená konštrukcia, Bluetooth 5.0, Ambient sound, Hi-Res audio, hlasový asistent, priestorový zvuk 7.1, prepínanie skladieb, prijímanie hovorov, s ovládaním hlasitosti, menič 40 mm, výdrž batérie až 20 h'),
  ('AirPods Max Purple', 1, 4, 9, 559.99, 99, 'Bezdrôtové slúchadlá, cez hlavu, aktívne potlačenie hluku, výdrž batérie až 20 h', 'Bezdrôtové slúchadlá - s mikrofónom, cez hlavu, okolo uší, aktívne potlačenie hluku (ANC), uzatvorená konštrukcia, Bluetooth 5.0, Ambient sound, Hi-Res audio, hlasový asistent, priestorový zvuk 7.1, prepínanie skladieb, prijímanie hovorov, s ovládaním hlasitosti, menič 40 mm, výdrž batérie až 20 h'),
  ('AirPods Max Midnight', 1, 4, 1, 559.99, 99, 'Bezdrôtové slúchadlá, cez hlavu, aktívne potlačenie hluku, výdrž batérie až 20 h', 'Bezdrôtové slúchadlá - s mikrofónom, cez hlavu, okolo uší, aktívne potlačenie hluku (ANC), uzatvorená konštrukcia, Bluetooth 5.0, Ambient sound, Hi-Res audio, hlasový asistent, priestorový zvuk 7.1, prepínanie skladieb, prijímanie hovorov, s ovládaním hlasitosti, menič 40 mm, výdrž batérie až 20 h'),
  ('AirPods Max Starlight', 1, 4, 7, 559.99, 99, 'Bezdrôtové slúchadlá, cez hlavu, aktívne potlačenie hluku, výdrž batérie až 20 h', 'Bezdrôtové slúchadlá - s mikrofónom, cez hlavu, okolo uší, aktívne potlačenie hluku (ANC), uzatvorená konštrukcia, Bluetooth 5.0, Ambient sound, Hi-Res audio, hlasový asistent, priestorový zvuk 7.1, prepínanie skladieb, prijímanie hovorov, s ovládaním hlasitosti, menič 40 mm, výdrž batérie až 20 h'),
  ('AirPods Max Orange', 1, 4, 5, 559.99, 99, 'Bezdrôtové slúchadlá, cez hlavu, aktívne potlačenie hluku, výdrž batérie až 20 h', 'Bezdrôtové slúchadlá - s mikrofónom, cez hlavu, okolo uší, aktívne potlačenie hluku (ANC), uzatvorená konštrukcia, Bluetooth 5.0, Ambient sound, Hi-Res audio, hlasový asistent, priestorový zvuk 7.1, prepínanie skladieb, prijímanie hovorov, s ovládaním hlasitosti, menič 40 mm, výdrž batérie až 20 h'),
  -- Audio (other)
  ('Marshall Major IV', 2, 4, 1, 75.99, 99, 'Bezdrôtové slúchadlá, cez hlavu, 3,5 mm Jack, Bluetooth, výdrž batérie až 80 h', 'Bezdrôtové slúchadlá - s mikrofónom, cez hlavu, na uši, uzatvorená konštrukcia, 3,5 mm Jack, Bluetooth 5.0, prepínanie skladieb, prijímanie hovorov, s ovládaním hlasitosti, frekvenčný rozsah 20-20000 Hz, citlivosť 99 dB/mW, impedancia 32 Ohm, menič 40 mm, odnímateľný kábel 1,5 m, výdrž batérie až 80 h'),
  ('Marshall Major V Black', 2, 4, 1, 149.99, 99, 'Bezdrôtové slúchadlá, cez hlavu, Bluetooth 5.3, výdrž batérie až 100 h', 'Bezdrôtové slúchadlá - s mikrofónom, cez hlavu, na uši, polouzatvorená konštrukcia, Bluetooth 5.3, podpora SBC, prijímanie hovorov, frekvenčný rozsah 20-20000 Hz, citlivosť 99 dB/mW, impedancia 32 Ohm, výdrž batérie až 100 h'),
  ('Marshall Major V Brown', 2, 4, 10, 149.99, 99, 'Bezdrôtové slúchadlá, cez hlavu, Bluetooth 5.3, výdrž batérie až 100 h', 'Bezdrôtové slúchadlá - s mikrofónom, cez hlavu, na uši, polouzatvorená konštrukcia, Bluetooth 5.3, podpora SBC, prijímanie hovorov, frekvenčný rozsah 20-20000 Hz, citlivosť 99 dB/mW, impedancia 32 Ohm, výdrž batérie až 100 h'),
  ('Marshall Major V Cream', 2, 4, 2, 149.99, 99, 'Bezdrôtové slúchadlá, cez hlavu, Bluetooth 5.3, výdrž batérie až 100 h', 'Bezdrôtové slúchadlá - s mikrofónom, cez hlavu, na uši, polouzatvorená konštrukcia, Bluetooth 5.3, podpora SBC, prijímanie hovorov, frekvenčný rozsah 20-20000 Hz, citlivosť 99 dB/mW, impedancia 32 Ohm, výdrž batérie až 100 h'),
  ('Marshall Motif II', 2, 4, 1, 137.99, 99, 'Bezdrôtové slúchadlá, True Wireless, aktívne potlačenie hluku, Bluetooth 5.3, IPX5', 'Bezdrôtové slúchadlá - s mikrofónom, True Wireless, štuple, aktívne potlačenie hluku (ANC), uzatvorená konštrukcia, Bluetooth 5.3, podpora SBC, prepínanie skladieb, prijímanie hovorov, s ovládaním hlasitosti, certifikácia IPX5, frekvenčný rozsah 20-20000 Hz, citlivosť 108 dB/mW, impedancia 16 Ohm, výdrž batérie až 9 h (9 h+43 h)'),
  ('JBL Go 2 Black', 3, 4, 1, 34.99, 99, 'Výkon 3,1 W, Bluetooth 4.2, certifikácia IP67, výdrž batérie 5 h', 'Bluetooth reproduktor - s výkonom 3,1 W, k mobilu, frekvenčný rozsah od 180 Hz do 20000 Hz, Bluetooth 4.2, certifikácia IP67, ovládanie cez zariadenia s OS iOS alebo Android, výdrž batérie 5 h'),
  ('JBL Go 2 Blue', 3, 4, 3, 34.99, 99, 'Výkon 3,1 W, Bluetooth 4.2, certifikácia IP67, výdrž batérie 5 h', 'Bluetooth reproduktor - s výkonom 3,1 W, k mobilu, frekvenčný rozsah od 180 Hz do 20000 Hz, Bluetooth 4.2, certifikácia IP67, ovládanie cez zariadenia s OS iOS alebo Android, výdrž batérie 5 h'),
  ('JBL Go 2 Red', 3, 4, 5, 34.99, 99, 'Výkon 3,1 W, Bluetooth 4.2, certifikácia IP67, výdrž batérie 5 h', 'Bluetooth reproduktor - s výkonom 3,1 W, k mobilu, frekvenčný rozsah od 180 Hz do 20000 Hz, Bluetooth 4.2, certifikácia IP67, ovládanie cez zariadenia s OS iOS alebo Android, výdrž batérie 5 h'),
  ('JBL Flip Essential', 3, 4, 8, 79.99, 99, 'Výkon 20 W, Bluetooth 5.1, certifikácia IPX7, výdrž batérie 10 h', 'Bluetooth reproduktor - aktívny, s výkonom 20 W, k mobilu, frekvenčný rozsah od 65 Hz do 20000 Hz, Bluetooth 5.1, certifikácia IPX7, ovládanie cez zariadenia s OS iOS alebo Android, výdrž batérie 10 h'),
  ('JBL Charge 5 White', 3, 4, 2, 143.99, 99, 'Výkon 40 W, Bluetooth 5.1, certifikácia IP67, výdrž batérie 20 h', 'Bluetooth reproduktor - aktívny, s výkonom 40 W, k mobilu, s USB napájaním, frekvenčný rozsah od 65 Hz do 20000 Hz, Bluetooth 5.1, certifikácia IP67, ovládanie cez zariadenia s OS iOS alebo Android, výdrž batérie 20 h'),
  ('JBL Charge 5 Green', 3, 4, 4, 143.99, 99, 'Výkon 40 W, Bluetooth 5.1, certifikácia IP67, výdrž batérie 20 h', 'Bluetooth reproduktor - aktívny, s výkonom 40 W, k mobilu, s USB napájaním, frekvenčný rozsah od 65 Hz do 20000 Hz, Bluetooth 5.1, certifikácia IP67, ovládanie cez zariadenia s OS iOS alebo Android, výdrž batérie 20 h'),
  ('JBL Charge 5 Blue', 3, 4, 3, 143.99, 99, 'Výkon 40 W, Bluetooth 5.1, certifikácia IP67, výdrž batérie 20 h', 'Bluetooth reproduktor - aktívny, s výkonom 40 W, k mobilu, s USB napájaním, frekvenčný rozsah od 65 Hz do 20000 Hz, Bluetooth 5.1, certifikácia IP67, ovládanie cez zariadenia s OS iOS alebo Android, výdrž batérie 20 h'),
  ('JBL Charge 5 Red', 3, 4, 5, 143.99, 99, 'Výkon 40 W, Bluetooth 5.1, certifikácia IP67, výdrž batérie 20 h', 'Bluetooth reproduktor - aktívny, s výkonom 40 W, k mobilu, s USB napájaním, frekvenčný rozsah od 65 Hz do 20000 Hz, Bluetooth 5.1, certifikácia IP67, ovládanie cez zariadenia s OS iOS alebo Android, výdrž batérie 20 h'),
  ('JBL Charge 5 Pink', 3, 4, 6, 143.99, 99, 'Výkon 40 W, Bluetooth 5.1, certifikácia IP67, výdrž batérie 20 h', 'Bluetooth reproduktor - aktívny, s výkonom 40 W, k mobilu, s USB napájaním, frekvenčný rozsah od 65 Hz do 20000 Hz, Bluetooth 5.1, certifikácia IP67, ovládanie cez zariadenia s OS iOS alebo Android, výdrž batérie 20 h'),
  ('JBL Charge 5 Gray', 3, 4, 8, 143.99, 99, 'Výkon 40 W, Bluetooth 5.1, certifikácia IP67, výdrž batérie 20 h', 'Bluetooth reproduktor - aktívny, s výkonom 40 W, k mobilu, s USB napájaním, frekvenčný rozsah od 65 Hz do 20000 Hz, Bluetooth 5.1, certifikácia IP67, ovládanie cez zariadenia s OS iOS alebo Android, výdrž batérie 20 h'),
  ('JBL Charge 5 Black', 3, 4, 1, 143.99, 99, 'Výkon 40 W, Bluetooth 5.1, certifikácia IP67, výdrž batérie 20 h', 'Bluetooth reproduktor - aktívny, s výkonom 40 W, k mobilu, s USB napájaním, frekvenčný rozsah od 65 Hz do 20000 Hz, Bluetooth 5.1, certifikácia IP67, ovládanie cez zariadenia s OS iOS alebo Android, výdrž batérie 20 h'),
  ('JBL Partybox 120', 3, 4, 1, 359.99, 99, 'Výkon 160 W, Bluetooth 5.4, certifikácia IPX4, výdrž batérie 12 h', 'Bluetooth reproduktor - aktívny, s výkonom 160 W, párty, s prehrávaním USB flash, frekvenčný rozsah od 40 Hz do 20000 Hz, AUX, Bluetooth 5.4, certifikácia IPX4, podpora FLAC a mp3, ovládanie cez zariadenia s OS iOS alebo Android, výdrž batérie 12 h'),
  ('JBL Partybox 320', 3, 4, 1, 599.99, 99, 'Výkon 240 W, Bluetooth 5.4, certifikácia IPX4, výdrž batérie 18 h', 'Bluetooth reproduktor - aktívny, s výkonom 240 W, párty, s prehrávaním USB flash, frekvenčný rozsah od 40 Hz do 20000 Hz, AUX, Bluetooth 5.4, certifikácia IPX4, podpora FLAC a mp3, ovládanie cez zariadenia s OS iOS alebo Android, výdrž batérie 18 h'),
  ('JBL Partybox 710', 3, 4, 1, 799.99, 99, 'Výkonom 800 W, Bluetooth 5.1, certifikácia IPX4', 'Bluetooth reproduktor - aktívny, s výkonom 800 W, k mobilu a párty, s prehrávaním USB flash, s USB napájaním, frekvenčný rozsah od 35 Hz do 20000 Hz, 3,5 mm Jack, Bluetooth 5.1, certifikácia IPX4, ovládanie cez zariadenia s OS iOS alebo Android');


DO $$
DECLARE
  rec   RECORD;
  img_id INTEGER;
BEGIN
  FOR rec IN
    SELECT *
    FROM (VALUES
      (1,6),(2,6),(3,6),(4,6),(5,6),(6,6),(7,6),(8,6),
      (9,6),(10,6),(11,6),(12,6),(13,5),(14,5),(15,5),(16,5),
      (17,4),(18,4),(19,4),(20,4),(21,4),(22,4),(23,5),(24,5),
      (25,5),(26,5),(27,4),(28,4),(29,6),(30,8),(31,5),(32,7),
      (33,4),(34,4),(35,4),(36,4),(37,4),(38,4),(39,4),(40,3),
      (41,5),(42,5),(43,4),(44,4),(45,4),(46,4),(47,3),(48,3),
      (49,3),(50,3),(51,3),(52,3),(53,3),(54,5),(55,5),(56,6)
    ) AS t(product_id, cnt)
  LOOP
    FOR i IN 1..rec.cnt LOOP
      INSERT INTO Images(path)
      VALUES (
        format(
          'assets/product_pictures/%s/%s.webp',
          rec.product_id,
          i
        )
      )
      RETURNING uid INTO img_id;

      INSERT INTO product_images(product_id, image_id)
      VALUES (rec.product_id, img_id);
    END LOOP;
  END LOOP;
END
$$;
