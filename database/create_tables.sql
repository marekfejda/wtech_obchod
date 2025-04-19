CREATE TABLE Brands (
  id SERIAL PRIMARY KEY,
  brand VARCHAR NOT NULL
);

CREATE TABLE Colors (
  id SERIAL PRIMARY KEY,
  color VARCHAR NOT NULL
);

CREATE TABLE Products (
  id SERIAL PRIMARY KEY,
  name VARCHAR NOT NULL,
  brand_id INTEGER NOT NULL REFERENCES Brands(id),
  color_id INTEGER NOT NULL REFERENCES Colors(id),
  price FLOAT NOT NULL,
  stockQuantity INTEGER NOT NULL,
  short_description TEXT,
  description TEXT,
  created_at TIMESTAMP NOT NULL DEFAULT NOW()
);

CREATE TABLE Categories (
  id SERIAL PRIMARY KEY,
  category VARCHAR NOT NULL
);

CREATE TABLE product_categories (
  product_id INTEGER NOT NULL REFERENCES Products(id),
  category_id INTEGER NOT NULL REFERENCES Categories(id),
  PRIMARY KEY (product_id, category_id)
);

CREATE TABLE Images (
  uid SERIAL PRIMARY KEY,
  path VARCHAR NOT NULL
);

CREATE TABLE product_images (
  product_id INTEGER NOT NULL REFERENCES Products(id),
  image_id INTEGER NOT NULL REFERENCES Images(uid),
  PRIMARY KEY (product_id, image_id)
);

CREATE TABLE Users (
  id SERIAL PRIMARY KEY,
  username VARCHAR NOT NULL,
  role VARCHAR NOT NULL,
  email VARCHAR NOT NULL UNIQUE,
  password VARCHAR NOT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT NOW()
);

CREATE TABLE Orders (
  id SERIAL PRIMARY KEY,
  user_id INTEGER NOT NULL REFERENCES Users(id),
  name_surname VARCHAR NOT NULL,
  address_streetnumber VARCHAR NOT NULL,
  PSC VARCHAR NOT NULL,
  city_country VARCHAR NOT NULL,
  phone_number VARCHAR NOT NULL,
  email VARCHAR NOT NULL,
  payment_type VARCHAR NOT NULL,
  card_number BIGINT,
  exp_date DATE,
  cvc VARCHAR,
  card_holder VARCHAR,
  created_at TIMESTAMP NOT NULL DEFAULT NOW()
);

CREATE TABLE order_products (
  order_id INTEGER NOT NULL REFERENCES Orders(id),
  product_id INTEGER NOT NULL REFERENCES Products(id),
  amount INTEGER NOT NULL,
  PRIMARY KEY (order_id, product_id)
);

CREATE TABLE CartItems (
  user_id INTEGER NOT NULL REFERENCES Users(id),
  product_id INTEGER NOT NULL REFERENCES Products(id),
  amount INTEGER NOT NULL,
  PRIMARY KEY (user_id, product_id)
);
