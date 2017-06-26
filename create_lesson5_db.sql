create table customer (
    id int auto_increment primary key,
    name varchar(255) not null,
    email varchar(255) not null unique,
    password varchar(255) not null,
    birthday int not null,
    postal_code char(8) not null,
    address varchar(255) not null,
    phone_number varchar(13) not null
);

update customer set name=?, email=?, password=?, birthday=?, postal_code=?, address=?, phone_number=? where id=?

insert into customer values (null,?,?,?,?,?,?,?)

create table product (
    product_id varchar(255) primary key,
    product_name varchar(255) not null,
    price int not null,
    stock int not null
);