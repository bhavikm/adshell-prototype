
CREATE TABLE PartnersAuthorization (
                authorizationID INT NOT NULL,
                driverLicenceNumber VARCHAR(20) NOT NULL,
                dateOfBirth DATE NOT NULL,
                signatureObtained BOOLEAN NOT NULL,
                PRIMARY KEY (authorizationID)
);


CREATE TABLE Account (
                accountID INT NOT NULL,
                userName VARCHAR(20) NOT NULL,
                password VARCHAR(60) NOT NULL,
                PRIMARY KEY (accountID)
);


CREATE TABLE CreditCardType (
                creditCardTypeID INT NOT NULL,
                creditCardType VARCHAR(25) NOT NULL,
                PRIMARY KEY (creditCardTypeID)
);


CREATE TABLE JobType (
                jobTypeID INT NOT NULL,
                jobTypeDescription VARCHAR(200) NOT NULL,
                PRIMARY KEY (jobTypeID)
);


CREATE TABLE Employee (
                employeeID INT NOT NULL,
                accountID INT NOT NULL,
                jobTypeID INT NOT NULL,
                empName VARCHAR(40) NOT NULL,
                empPhone NUMERIC(10) NOT NULL,
                empAddress VARCHAR(200) NOT NULL,
                PRIMARY KEY (employeeID)
);


CREATE TABLE ProductType (
                productTypeID INT NOT NULL,
                productName VARCHAR(30) NOT NULL,
                unitPrice DOUBLE NOT NULL,
                PRIMARY KEY (productTypeID)
);


CREATE TABLE BusinessType (
                businessTypeID INT AUTO_INCREMENT NOT NULL,
                businessType VARCHAR(25) NOT NULL,
                PRIMARY KEY (businessTypeID)
);


CREATE TABLE Application (
                applicationID INT AUTO_INCREMENT NOT NULL,
                employeeID INT NOT NULL,
                businessTypeID INT NOT NULL,
                contactName VARCHAR(40) NOT NULL,
                email VARCHAR(80) NOT NULL,
                abn NUMERIC(11) NOT NULL,
                businessName VARCHAR(40) NOT NULL,
                operationsNaure VARCHAR(200) NOT NULL,
                businessStartYear INT NOT NULL,
                phone NUMERIC(10) NOT NULL,
                position VARCHAR(40) NOT NULL,
                tradingName VARCHAR(50) NOT NULL,
                fax NUMERIC(10) NOT NULL,
                existingSupplierPhone NUMERIC(10) NOT NULL,
                mobile NUMERIC(10) NOT NULL,
                applicationStatus VARCHAR(10) NOT NULL,
                applicationDate DATE NOT NULL,
                creditLimit NUMERIC(5) NOT NULL,
                existingFuelSupplier VARCHAR(40) NOT NULL,
                PRIMARY KEY (applicationID)
);


CREATE TABLE FuelCards (
                fuelCardID INT NOT NULL,
                applicationID INT NOT NULL,
                accountID INT NOT NULL,
                cardHolderName VARCHAR(40) NOT NULL,
                cardStatus VARCHAR(10) NOT NULL,
                dateCreated DATE NOT NULL,
                pinRequired BOOLEAN NOT NULL,
                pin INT NOT NULL,
                PRIMARY KEY (fuelCardID)
);


CREATE TABLE FuelCardProducts (
                fuelCardID INT NOT NULL,
                productTypeID INT NOT NULL,
                PRIMARY KEY (fuelCardID, productTypeID)
);


CREATE TABLE FuelTransactions (
                transactionID INT NOT NULL,
                productTypeID INT NOT NULL,
                fuelCardID INT NOT NULL,
                totalPrice DOUBLE NOT NULL,
                date DATE NOT NULL,
                quantity INT NOT NULL,
                time TIME NOT NULL,
                PRIMARY KEY (transactionID)
);


CREATE TABLE BusinessPartners (
                businessPartnetID INT NOT NULL,
                authorizationID INT NOT NULL,
                applicationID INT NOT NULL,
                partnerName VARCHAR(40) NOT NULL,
                partnerPhone NUMERIC(10) NOT NULL,
                partnerPostcode INT NOT NULL,
                partnerAddress VARCHAR(200) NOT NULL,
                partnerState VARCHAR(3) NOT NULL,
                PRIMARY KEY (businessPartnetID)
);


CREATE TABLE Customer (
                customerID INT NOT NULL,
                applicationID INT NOT NULL,
                accountID INT NOT NULL,
                accountCreated DATE NOT NULL,
                customerStatus VARCHAR(10) NOT NULL,
                PRIMARY KEY (customerID)
);


CREATE TABLE CustomerAccReview (
                accountReviewID INT NOT NULL,
                customerID INT NOT NULL,
                employeeID INT NOT NULL,
                oldStatus VARCHAR(10) NOT NULL,
                dateTime DATETIME NOT NULL,
                newStatus VARCHAR(10) NOT NULL,
                PRIMARY KEY (accountReviewID)
);


CREATE TABLE Payments (
                paymentID INT NOT NULL,
                customerID INT NOT NULL,
                paymentMethod VARCHAR(20) NOT NULL,
                paymentDate DATE NOT NULL,
                amount DOUBLE NOT NULL,
                PRIMARY KEY (paymentID)
);


CREATE TABLE CreditCardInfo (
                creditCardID INT NOT NULL,
                applicationID INT NOT NULL,
                creditCardTypeID INT NOT NULL,
                creditCardNo NUMERIC NOT NULL,
                cardHolderName VARCHAR(40) NOT NULL,
                monthlyPaymentDay INT NOT NULL,
                expiryDate DATE NOT NULL,
                PRIMARY KEY (creditCardID, applicationID)
);


CREATE TABLE DirectDebitInfo (
                directDebitID INT NOT NULL,
                applicationID INT NOT NULL,
                financialInstitution VARCHAR(40) NOT NULL,
                cheque BOOLEAN NOT NULL,
                accountNo NUMERIC NOT NULL,
                bsb NUMERIC NOT NULL,
                savings BOOLEAN NOT NULL,
                accountName VARCHAR(40) NOT NULL,
                PRIMARY KEY (directDebitID)
);


CREATE TABLE ApplicationReferences (
                referenceID INT AUTO_INCREMENT NOT NULL,
                applicationID INT NOT NULL,
                refPhone NUMERIC(10) NOT NULL,
                referenceName VARCHAR(40) NOT NULL,
                PRIMARY KEY (referenceID)
);


ALTER TABLE BusinessPartners ADD CONSTRAINT businesspartners_partnersauthorization_fk
FOREIGN KEY (authorizationID)
REFERENCES PartnersAuthorization (authorizationID)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Customer ADD CONSTRAINT account_customer_fk
FOREIGN KEY (accountID)
REFERENCES Account (accountID)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE FuelCards ADD CONSTRAINT account_fuelcards_fk
FOREIGN KEY (accountID)
REFERENCES Account (accountID)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Employee ADD CONSTRAINT account_employee_fk
FOREIGN KEY (accountID)
REFERENCES Account (accountID)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE CreditCardInfo ADD CONSTRAINT creditcardtype_creditcardinfo_fk
FOREIGN KEY (creditCardTypeID)
REFERENCES CreditCardType (creditCardTypeID)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Employee ADD CONSTRAINT jobtype_employee_fk
FOREIGN KEY (jobTypeID)
REFERENCES JobType (jobTypeID)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Application ADD CONSTRAINT employee_application_fk
FOREIGN KEY (employeeID)
REFERENCES Employee (employeeID)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE CustomerAccReview ADD CONSTRAINT employee_customeraccreview_fk
FOREIGN KEY (employeeID)
REFERENCES Employee (employeeID)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE FuelTransactions ADD CONSTRAINT producttype_fueltransactions_fk
FOREIGN KEY (productTypeID)
REFERENCES ProductType (productTypeID)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE FuelCardProducts ADD CONSTRAINT producttype_fuelcardproducts_fk
FOREIGN KEY (productTypeID)
REFERENCES ProductType (productTypeID)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Application ADD CONSTRAINT businesstype_application_fk
FOREIGN KEY (businessTypeID)
REFERENCES BusinessType (businessTypeID)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE ApplicationReferences ADD CONSTRAINT application_references_fk
FOREIGN KEY (applicationID)
REFERENCES Application (applicationID)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE DirectDebitInfo ADD CONSTRAINT directdebitinfo_application_fk
FOREIGN KEY (applicationID)
REFERENCES Application (applicationID)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE CreditCardInfo ADD CONSTRAINT application_creditcardinfo_fk
FOREIGN KEY (applicationID)
REFERENCES Application (applicationID)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Customer ADD CONSTRAINT application_customer_fk
FOREIGN KEY (applicationID)
REFERENCES Application (applicationID)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE BusinessPartners ADD CONSTRAINT application_businesspartners_fk
FOREIGN KEY (applicationID)
REFERENCES Application (applicationID)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE FuelCards ADD CONSTRAINT application_fuelcards_fk
FOREIGN KEY (applicationID)
REFERENCES Application (applicationID)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE FuelTransactions ADD CONSTRAINT fuelcards_fueltransactions_fk
FOREIGN KEY (fuelCardID)
REFERENCES FuelCards (fuelCardID)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE FuelCardProducts ADD CONSTRAINT fuelcards_fuelcardproducts_fk
FOREIGN KEY (fuelCardID)
REFERENCES FuelCards (fuelCardID)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Payments ADD CONSTRAINT customer_payments_fk
FOREIGN KEY (customerID)
REFERENCES Customer (customerID)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE CustomerAccReview ADD CONSTRAINT customer_customeraccreview_fk
FOREIGN KEY (customerID)
REFERENCES Customer (customerID)
ON DELETE NO ACTION
ON UPDATE NO ACTION;