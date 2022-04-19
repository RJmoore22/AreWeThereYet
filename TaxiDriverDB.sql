
CREATE SCHEMA IF NOT EXISTS TaxiDriverDB DEFAULT CHARACTER SET utf8 ;
USE TaxiDriverDB ;

CREATE TABLE IF NOT EXISTS DRIVER (
    DRIVER_ID_NUM INT NOT NULL AUTO_INCREMENT,
    FNAME VARCHAR(45) NULL,
    LNAME VARCHAR(45) NULL,
    DRIVERS_NUM VARCHAR(45) NULL,
    REGION VARCHAR(45) NULL,
    CAR_MAKE VARCHAR(45) NULL,
    YEARS_EMPLOYED INT NULL,
    PF_PICTURE VARCHAR(45) NULL,
    CAR_MODEL VARCHAR(45) NULL,
    CAR_CLASS VARCHAR(45) NULL,
    RATING VARCHAR(45) NULL,
    REVIEW VARCHAR(300) NULL,
    PRIMARY KEY (DRIVER_ID_NUM)
) AUTO_INCREMENT=50;
CREATE TABLE IF NOT EXISTS CUSTOMER (
    CUST_ID INT NOT NULL AUTO_INCREMENT,
    CUSTOMER_USERNAME VARCHAR(45) NULL,
    CUSTOMER_PW VARCHAR(45) NULL,
    PRIMARY KEY (CUST_ID)
)AUTO_INCREMENT=11;  ;

CREATE TABLE IF NOT EXISTS admin (
    admin_user VARCHAR(45) NOT NULL,
    admin_pw VARCHAR(45) NULL,
    PRIMARY KEY (admin_user)
);

CREATE TABLE IF NOT EXISTS RATINGS (
  RATING_ID INT NOT NULL,
  DRIVING_RATING VARCHAR(45) NULL,
  PERSONALITY_RATING VARCHAR(45) NULL,
  PUNCUALITY_RATING VARCHAR(45) NULL,
  CLEAN_RATING VARCHAR(45) NULL,
  DRIVER_ID_NUM INT NOT NULL,
  CUSTOMER_CUST_ID INT NOT NULL,
  OVERALL_RATING INT NULL,
  REVIEW VARCHAR(45) NULL,
  PRIMARY KEY (RATING_ID),
  INDEX fk_RATINGS_DRIVER1_idx (DRIVER_ID_NUM ASC) ,
  INDEX fk_RATINGS_CUSTOMER1_idx (CUSTOMER_CUST_ID ASC) ,
  CONSTRAINT fk_RATINGS_DCUSTOMERRIVER1 FOREIGN KEY (DRIVER_ID_NUM) REFERENCES DRIVER (DRIVER_ID_NUM)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_RATINGS_CUSTOMER1 FOREIGN KEY (CUSTOMER_CUST_ID) REFERENCES CUSTOMER (CUST_ID)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);



CREATE TABLE IF NOT EXISTS SHIFTS (
  SHIFT_ID INT NOT NULL,
  SHIFT_START_TIME TIME NULL,
  SHIFT_END_TIME TIME NULL,
  SHIFT_DATE DATE NULL,
  DRIVER_ID_NUM INT NOT NULL,
  PRIMARY KEY (SHIFT_ID),
  INDEX fk_SHIFTS_DRIVER_idx (DRIVER_ID_NUM ASC) ,
  CONSTRAINT fk_SHIFTS_DRIVER FOREIGN KEY (DRIVER_ID_NUM) REFERENCES DRIVER (DRIVER_ID_NUM)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);




CREATE TABLE IF NOT EXISTS SCHEDULED_RIDES (
  RIDE_ID INT NOT NULL,
  START_TIME TIME NULL,
  END_TIME TIME NULL,
  SCHEDULE_DATE DATE NULL,
  SHIFTS_ID INT NOT NULL,
  DRIVER_ID_NUM INT NOT NULL,
  CUSTOMER_ID INT NOT NULL,
  PRIMARY KEY (RIDE_ID),
  INDEX fk_SCHEDULED_RIDES_SHIFTS1_idx (SHIFTS_ID ASC),
  INDEX fk_SCHEDULED_RIDES_DRIVER1_idx (DRIVER_ID_NUM ASC) ,
  INDEX fk_SCHEDULED_RIDES_CUSTOMER1_idx (CUSTOMER_ID ASC) ,
  CONSTRAINT fk_SCHEDULED_RIDES_SHIFTS1 FOREIGN KEY (SHIFTS_ID) REFERENCES SHIFTS (SHIFT_ID)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_SCHEDULED_RIDES_DRIVER1 FOREIGN KEY (DRIVER_ID_NUM) REFERENCES DRIVER (DRIVER_ID_NUM)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_SCHEDULED_RIDES_CUSTOMER1 FOREIGN KEY (CUSTOMER_ID) REFERENCES CUSTOMER (CUST_ID)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);






INSERT INTO DRIVER
VALUES
	('1', 'William', 'Parker', 'P 123 456 789 101', 'Rochester', 'Ford', '3', '../images/Person2.jpg', 'Focus',  'Sedan', '5/5 stars', 'Willima was a pretty nice guy and a great driver'),
	('2', 'John', 'Wallace', 'W 345 867 238 283', 'Auburn Hills', 'Tesla', '1', '../images/Person3.jpg', 'Model X',  'Electric Sedan', '3/5 stars' , 'Willima was a pretty nice guy and a great driver'),
	('3', 'Stacy', 'Jackson', 'J 736 938 009 288', 'Troy', 'Ford', '3', '../images/Person4.jpg', 'Escape', 'SUV', '2/5 stars', 'Willima was a pretty nice guy and a great driver'),
	('4', 'Steven', 'Johnson', 'J 412 098 888 756', 'Pontiac', 'Subaru', '1', '../images/NPerson5.jpg', 'Forester',  'SUV', '5/5 stars', 'Willima was a pretty nice guy and a great driver'),
	('5', 'Kelly', 'Smith', 'S 826 552 384 001', 'Pontiac', 'Subaru', '2', '../images/Person6.jpg', 'Outback',  'SUV', '3/5 stars', 'Willima was a pretty nice guy and a great driver'),
	('6', 'Sharon', 'Stevens', 'S 123 654 987 102', 'Rochester ', 'Honda', '5', '../images/Person7.jpg', 'Civic',  'Sedan', '4/5 stars', 'Willima was a pretty nice guy and a great driver'),
	('7', 'Sean', 'Johnson', 'J 837 372 108 390', 'Auburn Hills', 'Jeep', '4', '../images/Person08.jpg', 'Wrangler',  'SUV', '5/5 stars', 'Willima was a pretty nice guy and a great driver'),
	('8', 'Bruce', 'Hanson', 'H 913 819 049 280', 'Rochester ', 'Toyota', '4', '../images/Person9.jpg', 'Highlander',  'SUV', '4/5 stars', 'Willima was a pretty nice guy and a great driver'),
	('9', 'Jimmy', 'Banner', 'B 500 672 297 164', 'Pontiac', 'Jeep', '1', '../images/Person10.jpg', 'Cherokee',  'SUV', '3/5 stars', 'Willima was a pretty nice guy and a great driver'),
    ('10', 'Jake', 'Harper', 'H 837 827 090 434', 'Pontiac', 'Ford', '5', '../images/Person11.jpg', 'Expedition',  'Sports Utility', '5/5 stars', 'Willima was a pretty nice guy and a great driver');

INSERT INTO CUSTOMER 
	VALUES 
		('01', 'BillyBob', 'BillyBob123'),
		('02', 'Jake', 'jake123'),
		('03', 'andy', 'andy123'),
		('04', 'micheal', 'micheal123'),
		('05', 'Harris', 'Harris123'),
		('06', 'Jim', 'Jim123'),
		('07', 'Joe', 'Joe123'),
		('08', 'Ryan', 'Ryan123'),
		('09', 'Dennes', 'Dennes123'),
		('10', 'brett', 'Brett123');
				    
INSERT INTO admin
	VALUES
		('admin', 'admin123');
                    
INSERT INTO SHIFTS 
	VALUES 
		('01', '08:00:00', '17:00:00', '2022-04-20', '01'),
        ('02', '08:00:00', '17:00:00', '2022-04-21', '02'),
        ('03', '08:00:00', '17:00:00', '2022-04-22', '03'),
        ('04', '08:00:00', '17:00:00', '2022-04-23', '04'),
        ('05', '08:00:00', '17:00:00', '2022-04-24', '05'),
        ('06', '08:00:00', '17:00:00', '2022-04-25', '06'),
        ('07', '08:00:00', '17:00:00', '2022-04-26', '07'),
        ('08', '08:00:00', '17:00:00', '2022-04-27', '08'),
        ('09', '08:00:00', '17:00:00', '2022-04-28', '09'),
        ('10', '08:00:00', '17:00:00', '2022-04-29', '10');

INSERT INTO SCHEDULED_RIDES 
	VALUES 
		('01', '11:45', '12:45', '2022-04-20', '01', '01', '01'),
        ('02', '11:45', '12:45', '2022-04-21', '02', '02', '02'),
        ('03', '11:45', '12:45', '2022-04-22', '03', '03', '03'),
        ('04', '11:45', '12:45', '2022-04-23', '04', '04', '04'),
        ('05', '11:45', '12:45', '2022-04-24', '05', '05', '05'),
        ('06', '11:45', '12:45', '2022-04-25', '06', '06', '06'),
        ('07', '11:45', '12:45', '2022-04-26', '07', '07', '07'),
        ('08', '11:45', '12:45', '2022-04-27', '08', '08', '08'),
        ('09', '11:45', '12:45', '2022-04-28', '09', '09', '09'),
        ('10', '11:45', '12:45', '2022-04-29', '10', '10', '10');
    

INSERT INTO RATINGS
    VALUES
        ('01', '4', '3', '5', '2', '01', '01', '3', 'cool dude'),
        ('02', '2', '4', '4', '5', '02', '02', '3', 'bumpy ride'),
        ('03', '3', '4', '4', '3', '03', '03', '3', 'drives well'),
        ('04', '1', '2', '5', '4', '04', '04', '3', 'we crashed'),
        ('05', '2', '5', '3', '4', '05', '05', '3', 'didnt say much'),
        ('06', '5', '4', '4', '3', '06', '06', '3', 'got me there fast'),
        ('07', '4', '3', '4', '5', '07', '07', '3', 'he likes batman'),
        ('08', '3', '1', '5', '2', '08', '08', '3', 'rude'),
        ('09', '3', '3', '2', '1', '09', '09', '3', 'ok ride'),
        ('10', '4', '4', '1', '5', '10', '10', '3', 'pretty funny');

