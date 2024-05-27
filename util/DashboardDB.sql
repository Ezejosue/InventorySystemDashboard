-- Creación de la base de datos
CREATE DATABASE IF NOT EXISTS ProductInventory;
USE ProductInventory;

-- Tabla de categorías de productos
CREATE TABLE Categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT
);

-- Tabla de proveedores
CREATE TABLE Suppliers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    email VARCHAR(100)
);

-- Tabla de productos
CREATE TABLE Products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    stock INT NOT NULL,
    category_id INT,
    supplier_id INT,
    FOREIGN KEY (category_id) REFERENCES Categories(id),
    FOREIGN KEY (supplier_id) REFERENCES Suppliers(id)
);

-- Tabla de movimientos de inventario
CREATE TABLE InventoryMovements (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    type ENUM('entry', 'exit') NOT NULL,
    quantity INT NOT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES Products(id)
);

-- Inserts for Categories
INSERT INTO Categories (name, description) VALUES
('Electronics', 'Devices and gadgets'),
('Clothing', 'Apparel and accessories'),
('Furniture', 'Home and office furniture'),
('Food', 'Groceries and food items'),
('Books', 'Printed and digital books');

-- Inserts for Suppliers
INSERT INTO Suppliers (name, phone, email) VALUES
('Supplier One', '123-456-7890', 'contact@supplierone.com'),
('Supplier Two', '234-567-8901', 'info@suppliertwo.com'),
('Supplier Three', '345-678-9012', 'support@supplierthree.com'),
('Supplier Four', '456-789-0123', 'sales@supplierfour.com'),
('Supplier Five', '567-890-1234', 'service@supplierfive.com');

-- Procedimiento almacenado para agregar un producto
DELIMITER //
CREATE PROCEDURE AddProduct(
    IN productName VARCHAR(100),
    IN productDescription TEXT,
    IN productPrice DECIMAL(10, 2),
    IN productStock INT,
    IN productCategory INT,
    IN productSupplier INT
)
BEGIN
    INSERT INTO Products (name, description, price, stock, category_id, supplier_id)
    VALUES (productName, productDescription, productPrice, productStock, productCategory, productSupplier);
END //
DELIMITER ;

-- Procedimiento almacenado para actualizar el stock de un producto
DELIMITER //
CREATE PROCEDURE UpdateStock(
    IN productID INT,
    IN newQuantity INT,
    IN movementType ENUM('entry', 'exit')
)
BEGIN
    IF movementType = 'entry' THEN
        UPDATE Products SET stock = stock + newQuantity WHERE id = productID;
    ELSE
        UPDATE Products SET stock = stock - newQuantity WHERE id = productID;
    END IF;
    
    INSERT INTO InventoryMovements (product_id, type, quantity) VALUES (productID, movementType, newQuantity);
END //
DELIMITER ;

-- Trigger para asegurar que el stock no sea negativo
DELIMITER //
CREATE TRIGGER CheckStockBeforeExit
BEFORE UPDATE ON Products
FOR EACH ROW
BEGIN
    IF NEW.stock < 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Stock cannot be negative';
    END IF;
END //
DELIMITER ;

-- Ejemplos de uso de procedimientos almacenados
-- Llamada al procedimiento para agregar un producto
CALL AddProduct('Product A', 'Description of product A', 10.00, 100, 1, 1);

-- Llamada al procedimiento para actualizar el stock (entrada de 50 unidades)
CALL UpdateStock(1, 50, 'entry');

-- Llamada al procedimiento para actualizar el stock (salida de 30 unidades)
CALL UpdateStock(1, 30, 'exit');

-- Visualización de productos
SELECT * FROM Products;

-- Visualización de movimientos de inventario
SELECT * FROM InventoryMovements;
