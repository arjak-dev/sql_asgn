/*-------------------Creating table-------------*/
create database Emp;

/*----------------Selectign Database-------------*/
use Emp;

/*------------------Creating table-------------------*/
//emp_doamin
create table emp_domain(emp_domain char(20),domain_code_name char(20));
alter table emp_domain add primary key(emp_domain);

//emp_detail_table
create table employee_detail_table(employee_id char(10) primary key,employee_first_name char(20),employee_last_name char(20),graduation_percentile int);

//employee_salary_table
create table employee_salary_table(employee_id char(10) primary key,employee_salary int,employee_code char(20));

//employee_code_table
create table employee_code_table(employee_code char(20) primary key, employee_code_name char(20),employee_domain char(20));

//Adding foreign keys
alter table employee_salary_table add foreign key(employee_code) references employee_code_table(employee_code);
alter table employee_salary_table add foreign key(employee_id) references employee_detail_table(employee_id);


//employee_id table
create table employee_id(id_value int auto_increment primary key,const char(2));




/*-----------------------Data input from emp_domain table-------------*/
insert into emp_domain(emp_domain,domain_code_name) values('java','ru');

insert into emp_domain(emp_doamin,domain_code_name) values('PHP','du');

insert into emp_domain(emp_domain,domain_code_name) values('AngularJS','tu');



/*----------------------setting values for auto increment---------*/

alter table employee_id auto_increment = 100;
