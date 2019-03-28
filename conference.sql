
create table OrganizingCommittee
(
    eventName varchar(30) not null,
    primary key (eventName)
);
create table Worker
(
    workerID char(8) not null,
    fname varchar(30) not null,
    lname varchar(30) not null,
    primary key (workerID)
);
create table Subcommittee
(
    name varchar(20) not null,
    eventName varchar(20) not null,
    chairID char(8) not null,
    primary key (name, eventName),
    foreign key (eventName) references OrganizingCommittee(eventName) on delete cascade,
    foreign key (chairID) references Worker (	workerID)
);
create table Member
(
    workerID char(8) not null,
    name varchar(20) not null,
    primary key (workerID, name),
    foreign key (workerID) references Worker (workerID) on delete cascade,
    foreign key (name) references Subcommittee (name) on delete cascade
);
create table Room
(
    roomID numeric(3,0) not null,
    occupancy numeric(1,0) not null,
    check (occupancy > 0 ),
    check (occupancy < 4),
    primary key (roomID)
);
create table Attendees
(
    ID char(8) not null,
    fname varchar(30) not null,
    lname varchar(30) not null,
    primary key (ID)
);
create table Student
(
    ID char(8) not null,
    roomID numeric(3,0),
    primary key (ID),
    foreign key (ID) references Attendees (ID) on delete cascade,
    foreign key (roomID) references Room (roomID) on delete set null
);
create table Professional
(
    ID char(8) not null,
    primary key (ID),
    foreign key (ID) references Attendees (ID) on delete cascade
);
create table Company
(
    name varchar(30) not null,
    donation numeric(9,2) not null check (donation >= 1000),
    emailsSent numeric(1,0) not null check (emailsSent >= 0),
    primary key (name)
);
create table Sponsor
(
    ID char(8) not null,
    company varchar(30) not null,
    primary key (ID),
    foreign key (ID) references Attendees (ID) on delete cascade,
    foreign key (company) references Company (name) on delete cascade
);
create table JobAds
(
    jobID char(8) not null,
    title varchar(50) not null,
    company varchar(30) not null,
    payrate numeric(8,2) not null check (payrate >= 0),
    city varchar(30) not null,
    province varchar(30) not null,
    primary key (JobID),
    foreign key (company) references Company (name) on delete cascade
);
create table Session
(
    sessionID numeric(3,0) not null,
    room numeric(3,0) not null,
    day date not null,
    startTime time not null,
    endTime time,
    primary key (sessionID)
);
create table Speakers
(
    sessionID numeric(3,0) not null,
    speakerID char(8) not null,
    primary key (sessionID, speakerID),
    foreign key (sessionID) references Session (sessionID) on delete cascade,
    foreign key (speakerID) references Attendees (ID) on delete cascade
);
