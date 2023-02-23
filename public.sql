/*
 Navicat Premium Data Transfer

 Source Server         : kkp-project
 Source Server Type    : PostgreSQL
 Source Server Version : 110017 (110017)
 Source Host           : localhost:5432
 Source Catalog        : postgres
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 110017 (110017)
 File Encoding         : 65001

 Date: 14/02/2023 12:02:21
*/


-- ----------------------------
-- Sequence structure for category_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."category_seq";
CREATE SEQUENCE "public"."category_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1
CYCLE ;
ALTER SEQUENCE "public"."category_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for customer_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."customer_seq";
CREATE SEQUENCE "public"."customer_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1
CYCLE ;
ALTER SEQUENCE "public"."customer_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for item_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."item_seq";
CREATE SEQUENCE "public"."item_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1
CYCLE ;
ALTER SEQUENCE "public"."item_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for supp_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."supp_seq";
CREATE SEQUENCE "public"."supp_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1
CYCLE ;
ALTER SEQUENCE "public"."supp_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for unit_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."unit_seq";
CREATE SEQUENCE "public"."unit_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."unit_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for users_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."users_seq";
CREATE SEQUENCE "public"."users_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1
CYCLE ;
ALTER SEQUENCE "public"."users_seq" OWNER TO "postgres";

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS "public"."category";
CREATE TABLE "public"."category" (
  "category_id" int4 NOT NULL DEFAULT nextval('category_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default",
  "updated" timestamp(6)
)
;
ALTER TABLE "public"."category" OWNER TO "postgres";

-- ----------------------------
-- Records of category
-- ----------------------------
BEGIN;
INSERT INTO "public"."category" ("category_id", "name", "updated") VALUES (1, 'Nails Color', NULL);
INSERT INTO "public"."category" ("category_id", "name", "updated") VALUES (2, 'Nails', NULL);
COMMIT;

-- ----------------------------
-- Table structure for customer
-- ----------------------------
DROP TABLE IF EXISTS "public"."customer";
CREATE TABLE "public"."customer" (
  "customer_id" int4 NOT NULL DEFAULT nextval('customer_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default",
  "phone" varchar(255) COLLATE "pg_catalog"."default",
  "address" varchar(255) COLLATE "pg_catalog"."default",
  "gender" varchar(255) COLLATE "pg_catalog"."default",
  "created" timestamp(6),
  "updated" timestamp(6)
)
;
ALTER TABLE "public"."customer" OWNER TO "postgres";

-- ----------------------------
-- Records of customer
-- ----------------------------
BEGIN;
INSERT INTO "public"."customer" ("customer_id", "name", "phone", "address", "gender", "created", "updated") VALUES (1, 'Farhan Azhar', '0812345678', 'Jl. Mawar 123', 'L', '2022-10-27 12:55:13', NULL);
INSERT INTO "public"."customer" ("customer_id", "name", "phone", "address", "gender", "created", "updated") VALUES (2, 'Haekal Gonjes', '089512312', 'Jl. Bunga 12', 'L', '2022-10-27 12:55:50', NULL);
COMMIT;

-- ----------------------------
-- Table structure for item
-- ----------------------------
DROP TABLE IF EXISTS "public"."item";
CREATE TABLE "public"."item" (
  "item_id" int4 NOT NULL DEFAULT nextval('item_seq'::regclass),
  "barcode" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "name" varchar(255) COLLATE "pg_catalog"."default",
  "category_id" int4,
  "unit_id" int4,
  "price" numeric(20,0),
  "stock" varchar(255) COLLATE "pg_catalog"."default",
  "created" timestamp(6),
  "updated" timestamp(6),
  "user_id" int4,
  "created_by" int4,
  "image" varchar(255) COLLATE "pg_catalog"."default"
)
;
ALTER TABLE "public"."item" OWNER TO "postgres";

-- ----------------------------
-- Records of item
-- ----------------------------
BEGIN;
INSERT INTO "public"."item" ("item_id", "barcode", "name", "category_id", "unit_id", "price", "stock", "created", "updated", "user_id", "created_by", "image") VALUES (3, 'NL-00123', 'NAILS123', 1, 5, 1500, NULL, '2022-11-11 12:38:25', NULL, NULL, NULL, NULL);
INSERT INTO "public"."item" ("item_id", "barcode", "name", "category_id", "unit_id", "price", "stock", "created", "updated", "user_id", "created_by", "image") VALUES (4, 'NC-001', 'Nails Color Black White', 1, 5, 150000, NULL, '2022-11-11 12:58:18', NULL, NULL, NULL, NULL);
INSERT INTO "public"."item" ("item_id", "barcode", "name", "category_id", "unit_id", "price", "stock", "created", "updated", "user_id", "created_by", "image") VALUES (5, 'NL-111', 'TEST', 1, 4, 150, NULL, '2022-11-11 13:00:43', NULL, NULL, NULL, NULL);
INSERT INTO "public"."item" ("item_id", "barcode", "name", "category_id", "unit_id", "price", "stock", "created", "updated", "user_id", "created_by", "image") VALUES (6, 'TEST-001', 'TEST ITEM', 2, 4, 150, NULL, '2022-11-11 13:05:25', NULL, NULL, NULL, NULL);
INSERT INTO "public"."item" ("item_id", "barcode", "name", "category_id", "unit_id", "price", "stock", "created", "updated", "user_id", "created_by", "image") VALUES (2, 'NL-001', 'Nail Black', 1, 5, 20000, NULL, '2022-11-08 07:30:51', '2022-11-15 16:36:14', 1, NULL, NULL);
INSERT INTO "public"."item" ("item_id", "barcode", "name", "category_id", "unit_id", "price", "stock", "created", "updated", "user_id", "created_by", "image") VALUES (9, 'A001', 'Nails Red', 1, 3, 16000, NULL, '2023-01-28 16:16:42', NULL, NULL, 1, 'Screenshot_2023-01-27_at_18_52_28.png');
COMMIT;

-- ----------------------------
-- Table structure for supplier
-- ----------------------------
DROP TABLE IF EXISTS "public"."supplier";
CREATE TABLE "public"."supplier" (
  "supplier_id" int4 NOT NULL DEFAULT nextval('supp_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default",
  "phone" varchar(255) COLLATE "pg_catalog"."default",
  "address" varchar(255) COLLATE "pg_catalog"."default",
  "description" varchar(255) COLLATE "pg_catalog"."default",
  "created" timestamp(6),
  "updated" timestamp(6)
)
;
ALTER TABLE "public"."supplier" OWNER TO "postgres";

-- ----------------------------
-- Records of supplier
-- ----------------------------
BEGIN;
INSERT INTO "public"."supplier" ("supplier_id", "name", "phone", "address", "description", "created", "updated") VALUES (1, 'PT. Bintang Dagang Internasional', '0812312121', 'Jl. Pulo Kambing 123', 'Cat Warna Kuku', '2022-10-27 12:59:00', NULL);
COMMIT;

-- ----------------------------
-- Table structure for unit
-- ----------------------------
DROP TABLE IF EXISTS "public"."unit";
CREATE TABLE "public"."unit" (
  "unit_id" int4 NOT NULL DEFAULT nextval('unit_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default",
  "created" timestamp(6),
  "updated" timestamp(6),
  "created_by" int4
)
;
ALTER TABLE "public"."unit" OWNER TO "postgres";

-- ----------------------------
-- Records of unit
-- ----------------------------
BEGIN;
INSERT INTO "public"."unit" ("unit_id", "name", "created", "updated", "created_by") VALUES (5, 'box', '2022-11-08 07:30:16', NULL, 1);
INSERT INTO "public"."unit" ("unit_id", "name", "created", "updated", "created_by") VALUES (6, 'pallet', NULL, NULL, 1);
INSERT INTO "public"."unit" ("unit_id", "name", "created", "updated", "created_by") VALUES (3, 'pcs', '2022-10-27 13:00:14', NULL, 1);
INSERT INTO "public"."unit" ("unit_id", "name", "created", "updated", "created_by") VALUES (4, 'item', '2022-11-03 13:56:22', NULL, 1);
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS "public"."users";
CREATE TABLE "public"."users" (
  "user_id" int4 NOT NULL DEFAULT nextval('users_seq'::regclass),
  "username" varchar(255) COLLATE "pg_catalog"."default",
  "password" varchar(255) COLLATE "pg_catalog"."default",
  "name" varchar(255) COLLATE "pg_catalog"."default",
  "address" varchar(255) COLLATE "pg_catalog"."default",
  "level" varchar(255) COLLATE "pg_catalog"."default",
  "gender" varchar(255) COLLATE "pg_catalog"."default",
  "phone" numeric(36,0)
)
;
ALTER TABLE "public"."users" OWNER TO "postgres";

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO "public"."users" ("user_id", "username", "password", "name", "address", "level", "gender", "phone") VALUES (2, 'admin2', 'admin2', 'Admin 2', 'Jl. A', '2', NULL, NULL);
INSERT INTO "public"."users" ("user_id", "username", "password", "name", "address", "level", "gender", "phone") VALUES (3, 'admin3', 'admin3', 'admin 3', 'JL.B', '2', NULL, NULL);
INSERT INTO "public"."users" ("user_id", "username", "password", "name", "address", "level", "gender", "phone") VALUES (4, 'user1', 'user1', 'User 1', 'JL. ABC', '2', 'admin', NULL);
INSERT INTO "public"."users" ("user_id", "username", "password", "name", "address", "level", "gender", "phone") VALUES (6, 'testregis', 'testregis', 'testregis', 'Jl.a', '1', '1', 123123123123);
INSERT INTO "public"."users" ("user_id", "username", "password", "name", "address", "level", "gender", "phone") VALUES (7, 'Mas Agustus', 'asd5jklll', 'Agus', 'Jl nin aja duluyakan', '2', '1', 89518976601);
INSERT INTO "public"."users" ("user_id", "username", "password", "name", "address", "level", "gender", "phone") VALUES (8, 'Mas adam', 'adam123', 'Adam', 'JL.ABCD', '2', '1', 123123123123);
INSERT INTO "public"."users" ("user_id", "username", "password", "name", "address", "level", "gender", "phone") VALUES (9, 'agus1', 'agus123', 'Agus Setia', 'Jl. ABC', '2', '1', 123123123);
INSERT INTO "public"."users" ("user_id", "username", "password", "name", "address", "level", "gender", "phone") VALUES (1, 'admin', 'admin1', 'Admin', 'Jl. A', '1', 'admin', NULL);
INSERT INTO "public"."users" ("user_id", "username", "password", "name", "address", "level", "gender", "phone") VALUES (10, 'diaz1', 'diaz123', 'Diaz aja', 'Jl. A', '2', '1', 82828282828);
COMMIT;

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."category_seq"
OWNED BY "public"."category"."category_id";
SELECT setval('"public"."category_seq"', 2, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."customer_seq"
OWNED BY "public"."customer"."customer_id";
SELECT setval('"public"."customer_seq"', 2, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."item_seq"
OWNED BY "public"."item"."item_id";
SELECT setval('"public"."item_seq"', 9, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."supp_seq"
OWNED BY "public"."supplier"."supplier_id";
SELECT setval('"public"."supp_seq"', 1, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."unit_seq"
OWNED BY "public"."unit"."unit_id";
SELECT setval('"public"."unit_seq"', 6, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."users_seq"
OWNED BY "public"."users"."user_id";
SELECT setval('"public"."users_seq"', 10, true);

-- ----------------------------
-- Primary Key structure for table category
-- ----------------------------
ALTER TABLE "public"."category" ADD CONSTRAINT "category_pkey" PRIMARY KEY ("category_id");

-- ----------------------------
-- Primary Key structure for table item
-- ----------------------------
ALTER TABLE "public"."item" ADD CONSTRAINT "item_pkey" PRIMARY KEY ("item_id");

-- ----------------------------
-- Primary Key structure for table supplier
-- ----------------------------
ALTER TABLE "public"."supplier" ADD CONSTRAINT "supplier_pkey" PRIMARY KEY ("supplier_id");

-- ----------------------------
-- Primary Key structure for table unit
-- ----------------------------
ALTER TABLE "public"."unit" ADD CONSTRAINT "unit_pkey" PRIMARY KEY ("unit_id");

-- ----------------------------
-- Primary Key structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_pkey" PRIMARY KEY ("user_id");
