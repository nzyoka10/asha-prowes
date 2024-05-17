#### Database Report for `db_bluecollar`

##### Overview
- The `db_bluecollar` database is designed to manage the interactions between clients and service providers for a blue-collar service platform. 
- This report provides a detailed analysis of the database structure, the tables it contains, and the relationships between these tables. 
- It also highlights the integrity mechanisms in place to ensure data consistency and reliability.

#### Database Structure

1. **General Information**
   - **Database Name:** `db_bluecollar`
   - **Host:** `127.0.0.1`
   - **Creation Time:** March 15, 2024, at 10:53 AM
   - **Server Version:** 10.4.32-MySQL
   - **PHP Version:** 8.0.30

2. **Tables and Their Purpose**

   - **`tblclients`**
     - **Description:** Stores client information including personal details, contact information, and login credentials.
     - **Columns:**
       - `ClientID`: Integer, Primary Key, Auto Increment
       - `Fname`: First name (varchar)
       - `Lname`: Last name (varchar)
       - `Address`: Address (text)
       - `ContactNo`: Contact number (varchar)
       - `Status`: Client status (varchar, default 'Pending')
       - `cUsername`: Username (varchar)
       - `cPassword`: Password (varchar)
       - `PicLoc`: Profile picture location (text)
   
   - **`tblfeedback`**
     - **Description:** Manages feedback provided by clients for specific services.
     - **Columns:**
       - `FeedBackID`: Integer, Primary Key, Auto Increment
       - `ClientID`: Foreign Key to `tblclients`
       - `FeedBack`: Feedback text (text)
       - `ServiceID`: Foreign Key to `tblserviceprovider`
   
   - **`tblrating`**
     - **Description:** Stores client ratings for services received.
     - **Columns:**
       - `RatingID`: Integer, Primary Key, Auto Increment
       - `RatingNo`: Rating number (integer)
       - `ServiceID`: Foreign Key to `tblserviceprovider`
       - `ClientID`: Foreign Key to `tblclients`
       - `RateDate`: Rating date (date)
       - `FeedBack`: Feedback text (text)
   
   - **`tblrequest`**
     - **Description:** Keeps records of service requests made by clients.
     - **Columns:**
       - `RequestID`: Integer, Primary Key, Auto Increment
       - `Request`: Request description (text)
       - `Status`: Request status (varchar)
       - `Remarks`: Additional remarks (text)
       - `ClientID`: Foreign Key to `tblclients`
       - `ServiceID`: Foreign Key to `tblserviceprovider`
       - `USERID`: Foreign Key to `tblusers`
       - `Viewed`: Status of the request view (tinyint)
   
   - **`tblserviceprovider`**
     - **Description:** Contains information about service providers including their services, contact details, and status.
     - **Columns:**
       - `ServiceID`: Integer, Primary Key, Auto Increment
       - `ServiceName`: Service provider name (varchar)
       - `ServiceContact`: Contact number (varchar)
       - `ServiceAddress`: Address (text)
       - `lat`: Latitude (double)
       - `lng`: Longitude (double)
       - `Services`: Services offered (text)
       - `EmailAddress`: Email address (varchar, default 'ma5755333@gmail.com')
       - `spUsername`: Username (varchar)
       - `spPassword`: Password (varchar)
       - `Status`: Service provider status (varchar, default 'Confirmed')
       - `PicLoc`: Profile picture location (text)
   
   - **`tblusers`**
     - **Description:** Manages user accounts for administrators and staff.
     - **Columns:**
       - `USERID`: Integer, Primary Key, Auto Increment
       - `NAME`: User name (varchar)
       - `UEMAIL`: User email (varchar)
       - `PASS`: Password (varchar)
       - `TYPE`: User type (varchar)
       - `PicLoc`: Profile picture location (text)

3. **Data Integrity and Relationships**

   The database employs primary keys in each table to ensure unique identification of records. Foreign keys link related data across tables, preserving referential integrity. For example:
   - `ClientID` in `tblfeedback` and `tblrating` references `ClientID` in `tblclients`.
   - `ServiceID` in `tblfeedback`, `tblrating`, and `tblrequest` references `ServiceID` in `tblserviceprovider`.
   - `USERID` in `tblrequest` references `USERID` in `tblusers`.

  - Default values, such as the default 'Pending' status in `tblclients` and `tblserviceprovider`, help maintain consistent data states. 
  - The database uses the InnoDB storage engine, supporting transactions and ensuring ACID (Atomicity, Consistency, Isolation, Durability) properties.

##### Test Data

- The database dump includes sample records for initial setup and testing.
- These records illustrate typical entries, such as client profiles, service requests, feedback, and ratings.
- This sample data helps in the operational aspects of the application and facilitates testing and validation processes.

##### Conclusion

- The `db_bluecollar` database is well-structured to handle client-service provider interactions effectively. 
- With its robust table design, referential integrity, and sample data, it provides a solid foundation for blue-collar service platform.

