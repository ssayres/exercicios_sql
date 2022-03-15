<? include_once 'conecta.php' // fiz testes de conexao com php e acabei deixando a tag mesmo ?>

<?php  
/* ADENDO * FIZ ESSA FILE POIS ACHEI QUE FICARIA MAIS FACIL DE  SUBIR NO GITHUB *

1- INNERJOIN - BUSCA UMA COLUNA EM OUTRA TABELA, ATRAVÉS DE UMA KEY EM COMUM (UMA PRIMARY E UMA FOREIGN)
SELECT 
productCode, productName,textDescription
FROM
    classicmodels.products tabel1
    INNER JOIN classicmodels.productlines tabel2 
   ON tabel1.productLine = tabel2.productLine; 

 2 - INNER JOIN/ USING - FORMA CURTA DO INNER JOIN DEPOIS QUE O MÉTODO JÁ FOI INSTANCIADO 
 SELECT 
    productCode, 
    productName, 
    textDescription
FROM
    classicmodels.products
INNER JOIN classicmodels.productlines USING (productLine);

3- INNER JOIN / GROUP BY - usa a key em comum orderNumber para ordenar a busca entre as duas tabelas
FUNÇÃO DE AGREGAÇÃO SUM

SELECT
  t1.orderNumber,
    t1.status,
    SUM(quantityOrdered * priceEach) total
FROM
    classicmodels.orders t1
 INNER JOIN
 classicmodels.orderdetails t2

    ON t1.orderNumber = t2.orderNumber
GROUP BY orderNumber;

4 - GROUP BY/ USING - FORMA REDUZIDA UMA VEZ QUE O GROUP BY FOI INSTANCIADO 
 SELECT 
    orderNumber,
    status,
    SUM(quantityOrdered * priceEach) total
FROM
    classicmodels.orders
INNER JOIN classicmodels.orderdetails USING (orderNumber)
GROUP BY orderNumber;

5 - ORDER BY - INNER JOIN ORDENADO COMO O GROUP BY PORÉM ENTRE TRES TABELAS
,
    orderLineNumber,
    productName,
    quantityOrdered,
    priceEach
FROM
    classicmodels.orders
INNER JOIN
    classicmodels.orderdetails USING (orderNumber)
INNER JOIN
    classicmodels.products USING (productCode)
ORDER BY 
    orderNumber, 
    orderLineNumber;

6 - INNER JOIN - FILTRANDO VALORES POR DIFERENÇA 
SELECT 
    orderNumber, 
    productName, 
    msrp, 
    priceEach
FROM
    classicmodels.products p
INNER JOIN classicmodels.orderdetails o 
   ON p.productcode = o.productcode
      AND p.msrp > o.priceEach
WHERE
    p.productcode = 'S10_1678';

 7 - INNER JOIN - BUSCANDO POR PARÂMETROS DIFERENTES 
 SELECT 
    firstName, 
    city, 
    postalCode
FROM
    classicmodels.employees t1
INNER JOIN classicmodels.offices t2 
    ON t1.officeCode = t2.officeCode;      

8 - INNER JOIN - QUATRO TABELAS
SELECT 
    orderNumber,
    orderDate,
    customerName,
    orderLineNumber,
    productName,
    quantityOrdered,
    priceEach
FROM
    classicmodels.orders
INNER JOIN classicmodels.orderdetails 
    USING (orderNumber)
INNER JOIN classicmodels.products 
    USING (productCode)
INNER JOIN classicmodels.customers 
    USING (customerNumber)
ORDER BY 
    orderNumber, 
    orderLineNumber;

9 - EXISTS - busca pela condição de um cliente que fez ao menos três pedidos
SELECT 
    customerNumber, 
    customerName
FROM
    classicmodels.customers
WHERE
    EXISTS(
	SELECT 
            3
        FROM
           classicmodels.orders
        WHERE
            orders.customernumber 
		= customers.customernumber); 
 
10 - IS NULL - BUSCA PELA VALIDAÇÃO DE VALORES NÃO NULOS
 SELECT  
    city, 
    postalCode
FROM
    classicmodels.offices
postalCode IS NULL 
ORDER BY 
postalCode;        

11 - HAVING - PARECIDO COM GROUP BY - NESTE CASO BUSCA O NUMERO DOS PEDIDOS NUMERO DE VENDAS POR PEDIDO
E TOTAL DE VENDAS PRA CADA orderdetails :

SELECT 
    ordernumber,
    SUM(quantityOrdered) AS itemsCount,
    SUM(priceeach*quantityOrdered) AS total
FROM
    classicmodels.orderdetails
GROUP BY ordernumber;
HAVING 
   total > 1000;
   
12 - UNION - Eliminar as linhas duplicadas so shipaddress
SELECT ShipName, ShipAddress from classicmodels.Orders 
WHERE CustomerID ="WARTH" UNION SELECT ShipName, ShipAddress from classicmodels.Orders 
WHERE CustomerID ="VINET"

13 - UNION ALL - funciona como o UNION mas apresenta também as linhas duplicadas

SELECT employeeID, firstname, lastname FROM classicmodels.names WHERE dept = "prod"
UNION ALLSELECT employeeID, firstname, lastname FROM classicmodels.names WHERE city = "Orlando"
UNION ALL
SELECT employeeID, firstname, lastname FROM classicmodels.names WHERE division = "food"

14 - LEFT JOIN - o termo key vai me dar os registros da tabela da esquerda com os equivalentes da tabela da direita
SELECT 
products.productCode, products.productName,productlines.textDescriptionID
FROM
    classicmodels.products 
    LEFT JOIN classicmodels.productlines ON product.productLine = productline.productLine
ORDER BY
   product.productName;

15 - RIGHT JOIN - processo oposto da LEFT JOIN
SELECT productLine
FROM classicmodels.productlines
RIGHT JOIN classicmodels.products
ON productline.productLine = product.productLine;


16- SELECT DISTINCT - Mesma função do UNION

SELECT ShipName, ShipAddress 
FROM classicmodels.Orders 
WHERE CustomerID ="WARTH" UNION SELECT ShipName, ShipAddress 
FROM 
classicmodels.Orders WHERE CustomerID ="VINET"

    */ 

    ?>
