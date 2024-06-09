USE student_billing;

DROP TABLE IF EXISTS students;

CREATE TABLE students (
    school_id VARCHAR(50) PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    bill_amount DECIMAL(10, 2) NOT NULL DEFAULT 0.00
);
