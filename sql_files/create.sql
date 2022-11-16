--sql file of creating database and tables
CREATE DATABASE IF NOT EXISTS team19 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
use team19;


------------------------------------------------------------------------
-------------------------- tables for movies ---------------------------
------------------------------------------------------------------------

-- creating table of movies in ott (all movies)
CREATE TABLE IF NOT EXISTS movies_ott(
    mid INTEGER, netflix INTEGER,amazon_prime INTEGER, disney_plus INTEGER, hulu INTEGER,
    original_title VARCHAR(100),homepage VARCHAR(100), overview TEXT,
    popularity FLOAT, production_countries VARCHAR(200), release_date DATE,
    revenue BIGINT, runtime FLOAT, spoken_languages VARCHAR(200), vote_average FLOAT, vote_count INTEGER,
    genres_1 VARCHAR(200), genres_2 VARCHAR(200), genres_3 VARCHAR(200), 
    keywords_1 VARCHAR(200), keywords_2 VARCHAR(200), keywords_3 VARCHAR(200)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;


-- netflix
CREATE TABLE IF NOT EXISTS movies_netflix(
    mid INTEGER,
    original_title VARCHAR(100),homepage VARCHAR(100), overview TEXT,
    popularity FLOAT, production_countries VARCHAR(200), release_date DATE,
    revenue BIGINT, runtime FLOAT, spoken_languages VARCHAR(200), vote_average FLOAT, vote_count INTEGER,
    genres_1 VARCHAR(200), genres_2 VARCHAR(200), genres_3 VARCHAR(200), 
    keywords_1 VARCHAR(200), keywords_2 VARCHAR(200), keywords_3 VARCHAR(200)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

-- amazon_prime
CREATE TABLE IF NOT EXISTS movies_amazon_prime(
    mid INTEGER,
    original_title VARCHAR(100),homepage VARCHAR(100), overview TEXT,
    popularity FLOAT, production_countries VARCHAR(200), release_date DATE,
    revenue BIGINT, runtime FLOAT, spoken_languages VARCHAR(200), vote_average FLOAT, vote_count INTEGER,
    genres_1 VARCHAR(200), genres_2 VARCHAR(200), genres_3 VARCHAR(200), 
    keywords_1 VARCHAR(200), keywords_2 VARCHAR(200), keywords_3 VARCHAR(200)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

-- disney_plus
CREATE TABLE IF NOT EXISTS movies_disney_plus(
    mid INTEGER,
    original_title VARCHAR(100),homepage VARCHAR(100), overview TEXT,
    popularity FLOAT, production_countries VARCHAR(200), release_date DATE,
    revenue BIGINT, runtime FLOAT, spoken_languages VARCHAR(200), vote_average FLOAT, vote_count INTEGER,
    genres_1 VARCHAR(200), genres_2 VARCHAR(200), genres_3 VARCHAR(200), 
    keywords_1 VARCHAR(200), keywords_2 VARCHAR(200), keywords_3 VARCHAR(200)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

-- hulu
CREATE TABLE IF NOT EXISTS movies_hulu(
    mid INTEGER,
    original_title VARCHAR(100),homepage VARCHAR(100), overview TEXT,
    popularity FLOAT, production_countries VARCHAR(200), release_date DATE,
    revenue BIGINT, runtime FLOAT, spoken_languages VARCHAR(200), vote_average FLOAT, vote_count INTEGER,
    genres_1 VARCHAR(200), genres_2 VARCHAR(200), genres_3 VARCHAR(200), 
    keywords_1 VARCHAR(200), keywords_2 VARCHAR(200), keywords_3 VARCHAR(200)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

-- movie poster
CREATE TABLE IF NOT EXISTS movies_poster(
    mid INTEGER, img_src VARCHAR(150)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;


-- korean movie
CREATE TABLE IF NOT EXISTS movies_korean(
    mid INTEGER, release_year INTEGER, original_title VARCHAR(100),
    genres VARCHAR(100), director VARCHAR(100), producer VARCHAR(100), writer VARCHAR(100),
    cast TEXT, crank_in VARCHAR(100), crank_out VARCHAR(100), presents VARCHAR(100), distributor VARCHAR(100), production VARCHAR(100),
    release_data VARCHAR(100), etc TEXT
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

-- korean movie poster
CREATE TABLE IF NOT EXISTS movies_kor_poster(
    mid INTEGER, img_src VARCHAR(150)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

------------------------------------------------------------------------
--------------------------- tables for users ---------------------------
------------------------------------------------------------------------

-- user_db
CREATE TABLE IF NOT EXISTS user_db (
    user_id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_name varchar(20) NOT NULL,
    _password int(11) NOT NULL,
    user_email varchar(50) NOT NULL
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

-- user_board
CREATE TABLE IF NOT EXISTS user_board (
    user_id int(11) NOT NULL,
    board_id int(11) NOT NULL
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

-- user_fav_db
CREATE TABLE IF NOT EXISTS user_fav_db (
    user_id int(11) NOT NULL PRIMARY KEY,
    mid varchar(100) DEFAULT NULL
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

-- user_search_db
CREATE TABLE IF NOT EXISTS user_search_db (
    user_id int(11),
    search1 varchar(100), search2 varchar(100), search3 varchar(100), search4 varchar(100), search5 varchar(100)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

-- board_db
CREATE TABLE IF NOT EXISTS board_db (
    board_id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title varchar(20) NOT NULL,
    content text NOT NULL,   
    mid int(11),
    last_chg_date datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;