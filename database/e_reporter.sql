/*
* This is a creation of the database e_reporter, its entities and indexes for the E-Reporter application.
* To import this database first create a database called ' e_reporterdb '
*/

/*#Creating database e_reporter
#CREATE DATABASE e_reporterdb;

#Using the database to create entities and other table objects.
USE e_reporterdb;

#Creating table pollingstation
CREATE TABLE pollingstation(
	PCode VARCHAR(20),
    PName VARCHAR(100) NOT NULL,
    Region VARCHAR(20) NOT NULL,
    Constituency VARCHAR(50) NOT NULL,
    District VARCHAR(45) NOT NULL,
    NumRegistered  INT(6) NOT NULL,
    PRIMARY KEY (PCODE)
);

#Creating table adminuser
CREATE TABLE adminuser(
    Admin_Id INT(15) AUTO_INCREMENT,
	FirstName VARCHAR(100)   NOT NULL,
    MiddleName VARCHAR(100),
    Surname VARCHAR(100)     NOT NULL,
    Username VARCHAR(150)    NOT NULL,
    UPassword  VARCHAR(200)  NOT NULL,
    PhoneNumber VARCHAR(15)  NOT NULL,
    Email_Address VARCHAR(50) NOT NULL,
    Physical_Address VARCHAR(40) NOT NULL,
    PRIMARY KEY (Admin_Id)
);
#Setting an initial value of auto_increment for admin id
ALTER TABLE adminuser AUTO_INCREMENT=5549;

#Creating table publicuser
CREATE TABLE publicuser(
    User_Id INT(11) AUTO_INCREMENT,
	FirstName VARCHAR(100)   NOT NULL,
    MiddleName VARCHAR(100),
    Surname VARCHAR(100)     NOT NULL,
    CurrentLocation  VARCHAR(100)  NOT NULL,
    PCode VARCHAR(20) NOT NULL,
    PhoneNumber VARCHAR(10)  NOT NULL,
    PRIMARY KEY (User_Id),
    FOREIGN KEY(PCode) REFERENCES pollingstation(PCode)
);

#Creating table candidate
CREATE TABLE candidate(
    Candidate_Id INT(11) AUTO_INCREMENT,
	FirstName VARCHAR(100)   NOT NULL,
    MiddleName VARCHAR(100),
    Surname VARCHAR(100)     NOT NULL,
    Gender VARCHAR(6)    NOT NULL,
    Party  VARCHAR(50)  NOT NULL,
    Category VARCHAR(13) NOT NULL,
    Age VARCHAR(3)  NOT NULL,
    Election_Year INT(10) NOT NULL,
    PRIMARY KEY (Candidate_Id)
);
*/
#Creating table result_unofficial
CREATE TABLE result_unofficial(
    Post_Id INT(15) AUTO_INCREMENT,
    User_Id INT(11) NOT NULL,
    Candidate_Id INT(11) NOT NULL,
    PCode VARCHAR(20)    NOT NULL,
	PostDate DATETIME   NOT NULL,
    Result_Figures INT(10) NOT NULL,
    Result_Words VARCHAR(150)     NOT NULL,
    Result_Status  VARCHAR(11)  NOT NULL,
    PinkSheetPicture BLOB NOT NULL,
    PRIMARY KEY (Post_Id),
    FOREIGN KEY(User_Id) REFERENCES publicuser(User_Id),
    FOREIGN KEY(PCode) REFERENCES pollingstation(PCode),
    FOREIGN KEY(Candidate_Id) REFERENCES candidate(Candidate_Id)
);

#Creating table result_official
CREATE TABLE result_official(
    Result_Id INT(15) AUTO_INCREMENT,
    Candidate_Id INT(11) NOT NULL,
    TotalVotesGained INT(20)    NOT NULL,
    PRIMARY KEY (Result_Id),
    FOREIGN KEY(Candidate_Id) REFERENCES candidate(Candidate_Id)
);

#Creating table result_statistics
CREATE TABLE result_statistics(
    Stats_Id INT(15) AUTO_INCREMENT,
    User_Id INT(11) NOT NULL,
    PCode VARCHAR(20)    NOT NULL,
    TotalVotesCast INT(10) NOT NULL,
    ValidVotes INT(10) NOT NULL,
    RejectedVotes INT(10) NOT NULL,
    Voter_Turnout INT(10) NOT NULL,
    PRIMARY KEY (Stats_Id ),
    FOREIGN KEY(User_Id) REFERENCES publicuser(User_Id),
    FOREIGN KEY(PCode) REFERENCES pollingstation(PCode)
);

#Creating table adminuser_result_official
#This is a table generated from the breakdown of the many-to-many relationship between 
#the adminuser table and the adminuser_result_official table
CREATE TABLE adminuser_result_official(
    Admin_Id INT(15) NOT NULL,
    Result_Id INT(15) NOT NULL,
    ApprovalDate DATETIME   NOT NULL,
    FOREIGN KEY(Admin_Id) REFERENCES adminuser(Admin_Id),
    FOREIGN KEY(Result_Id) REFERENCES result_official(Result_Id)
);

#Creating table adminuser_result_unofficial
#This is a table generated from the breakdown of the many-to-many relationship between 
#the adminuser table and the adminuser_result_unofficial table
CREATE TABLE adminuser_result_unofficial(
    Admin_Id INT(15) NOT NULL,
    Post_Id INT(15) NOT NULL,
    FOREIGN KEY(Admin_Id) REFERENCES adminuser(Admin_Id),
    FOREIGN KEY(Post_Id) REFERENCES result_unofficial(Post_Id)
);


/*
*Creating indexes on the tables to enable faster searching.
*Searching is done by both the admin user wanting to view approved and unapproved results
*and the public user entering a polling station.
*/

USE e_reporterdb;

#Creating an index on PName attribute table of pollingstation
CREATE INDEX PStationIndex ON pollingstation(PName);

#Creating an index on Election_Year attribute  of candidate table
CREATE INDEX ElectionYearIndex ON candidate(Election_Year);

#Creating an index on TotalVotesCast, ValidVotes,RejectedVotes attributes of pollingstation table
CREATE INDEX StatsIndex ON result_statistics(TotalVotesCast, ValidVotes,RejectedVotes);







