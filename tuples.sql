insert into OrganizingCommittee
values
    ('Databases Conference');
insert into OrganizingCommittee
values
    ('Robot Conference');
insert into OrganizingCommittee
values
    ('Geology Conference');
insert into Worker
values
    ('00000001', 'John', 'Smith');
insert into Worker
values
    ('00000002', 'Susan', 'Anthony');
insert into Worker
values
    ('00000003', 'Jacob', 'Alan');
insert into Worker
values
    ('00000004', 'Abigael', 'McBride');
insert into Worker
values
    ('00000005', 'Eugene', 'Fitzherbert');
insert into Subcommittee
values
    ('Accounting Committee', 'Databases Conference', '00000001');
insert into Subcommittee
values
    ('Networking Committee', 'Databases Conference', '00000002');
insert into Subcommittee
values
    ('Setup Committee', 'Databases Conference', '00000002');
insert into Subcommittee
values
    ('Security Committee', 'Databases Conference', '00000005');
insert into Member
values
    ('00000002', 'Accounting Committee');
insert into Member
values
    ('00000003', 'Accounting Committee');
insert into Member
values
    ('00000004', 'Accounting Committee');
insert into Member
values
    ('00000001', 'Networking Committee');
insert into Member
values
    ('00000005', 'Setup Committee');
insert into Member
values
    ('00000003', 'Setup Committee');
insert into Member
values
    ('00000004', 'Setup Committee');
insert into Member
values
    ('00000003', 'Security Committee');
insert into Room
values
    ('101', '2');
insert into Room
values
    ('203', '1');
insert into Room
values
    ('205', '3');
insert into Room
values
    ('310', '1');
insert into Attendees
values
    ('10000000', 'Eugene', 'Fitzherbert');
insert into Attendees
values
    ('20000000', 'Mary Lou', 'Appleton');
insert into Attendees
values
    ('30000000', 'Sarah', 'Alec');
insert into Attendees
values
    ('40000000', 'James', 'Monroe');
insert into Attendees
values
    ('50000000', 'Neville', 'Longbottom');
insert into Attendees
values
    ('60000000', 'Francis', 'Saviour');
insert into Attendees
values
    ('70000000', 'Rimuru', 'Tempest');
insert into Attendees
values
    ('80000000', 'Adam', 'Reid');
insert into Attendees
values
    ('90000000', 'Xavier', 'Pablo');
insert into Student
values
    ('20000000', '101');
insert into Student
values
    ('50000000', null);
insert into Student
values
    ('40000000', '101');
insert into Professional
values
    ('60000000');
insert into Professional
values
    ('80000000');
insert into Professional
values
    ('90000000');
insert into Company
values
    ('Jura Forest Association', '1000000.00', '0');
insert into Company
values
    ('IBM', '1234.56', '1');
insert into Company
values
    ('Geologists Society', '23000.99', '2');
insert into Sponsor
values
    ('70000000', 'Jura Forest Association');
insert into Sponsor
values
    ('10000000', 'Geologists Society');
insert into Sponsor
values
    ('30000000', 'IBM');
insert into JobAds
values
    ('11112222', 'Architect', 'Jura Forest Association', '100000', 'Athens', 'Ontario');
insert into JobAds
values
    ('22223333', 'Software Engineer', 'IBM', '350000', 'Victoria', 'British Columbia');
insert into JobAds
values
    ('33334444', 'Structural Analyst', 'Geologists Society', '200500', 'Sudbury', 'Ontario');
insert into Session
values
    ('1', '203', '2019-02-09', '13:00', '15:30');
insert into Session
values
    ('20', '107', '2019-02-10', '17:30', '18:55');
insert into Session
values
    ('300', '563', '2019-02-10', '9:00', '11:45');
insert into Speakers
values
    ('1', '20000000');
insert into Speakers
values
    ('20', '10000000');
insert into Speakers
values
    ('300', '70000000');
