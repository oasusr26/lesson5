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

insert into product values (1, '松の実', 300, 4);
insert into product values (2, 'ひまわりの種', 500, 2);

create table purchase (
    id int not null primary key,
    customer_id int not null,
    foreign key(customer_id) references customer(id)
);

create table purchase_detail (
    purchase_id int auto_increment,
    product_id int not null,
    count int not null,
    order_date timestamp not null default CURRENT_TIMESTAMP,
    primary key(purchase_id, product_id),
    foreign key(purchase_id) references purchase(id),
    foreign key(product_id) references product(id)
);

alter table 'purchase_detail' change 'product_id2' 'product_id' int not null; 