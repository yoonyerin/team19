--sql file of creating database and tables
CREATE DATABASE IF NOT EXISTS team19 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
use team19;


------------------------------------------------------------------------
-------------------------- tables for movies ---------------------------
------------------------------------------------------------------------

-- creating table of movies in ott (all movies)
CREATE TABLE IF NOT EXISTS movies_ott(
    mid INTEGER PRIMARY KEY, netflix INTEGER,amazon_prime INTEGER, disney_plus INTEGER, hulu INTEGER,
    original_title VARCHAR(100),homepage VARCHAR(100), overview TEXT,
    popularity FLOAT, production_countries VARCHAR(200), release_date DATE,
    revenue BIGINT, runtime FLOAT, spoken_languages VARCHAR(200), vote_average FLOAT, vote_count INTEGER,
    genres_1 VARCHAR(200), genres_2 VARCHAR(200), genres_3 VARCHAR(200), 
    keywords_1 VARCHAR(200), keywords_2 VARCHAR(200), keywords_3 VARCHAR(200)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

-- netflix
CREATE TABLE IF NOT EXISTS movies_netflix(
    mid INTEGER,
    FOREIGN KEY(mid) REFERENCES movies_ott(mid),
    original_title VARCHAR(100),homepage VARCHAR(100), overview TEXT,
    popularity FLOAT, production_countries VARCHAR(200), release_date DATE,
    revenue BIGINT, runtime FLOAT, spoken_languages VARCHAR(200), vote_average FLOAT, vote_count INTEGER,
    genres_1 VARCHAR(200), genres_2 VARCHAR(200), genres_3 VARCHAR(200), 
    keywords_1 VARCHAR(200), keywords_2 VARCHAR(200), keywords_3 VARCHAR(200)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE UNIQUE INDEX nidx ON movies_netflix (mid);

-- amazon_prime
CREATE TABLE IF NOT EXISTS movies_amazon_prime(
    mid INTEGER,
    FOREIGN KEY(mid) REFERENCES movies_ott(mid),
    original_title VARCHAR(100),homepage VARCHAR(100), overview TEXT,
    popularity FLOAT, production_countries VARCHAR(200), release_date DATE,
    revenue BIGINT, runtime FLOAT, spoken_languages VARCHAR(200), vote_average FLOAT, vote_count INTEGER,
    genres_1 VARCHAR(200), genres_2 VARCHAR(200), genres_3 VARCHAR(200), 
    keywords_1 VARCHAR(200), keywords_2 VARCHAR(200), keywords_3 VARCHAR(200)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE UNIQUE INDEX aidx ON movies_amazon_prime(mid);

-- disney_plus
CREATE TABLE IF NOT EXISTS movies_disney_plus(
    mid INTEGER,
    FOREIGN KEY(mid) REFERENCES movies_ott(mid),
    original_title VARCHAR(100),homepage VARCHAR(100), overview TEXT,
    popularity FLOAT, production_countries VARCHAR(200), release_date DATE,
    revenue BIGINT, runtime FLOAT, spoken_languages VARCHAR(200), vote_average FLOAT, vote_count INTEGER,
    genres_1 VARCHAR(200), genres_2 VARCHAR(200), genres_3 VARCHAR(200), 
    keywords_1 VARCHAR(200), keywords_2 VARCHAR(200), keywords_3 VARCHAR(200)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE UNIQUE INDEX didx ON movies_disney_plus(mid);

-- hulu
CREATE TABLE IF NOT EXISTS movies_hulu(
    mid INTEGER,
    FOREIGN KEY(mid) REFERENCES movies_ott(mid),
    original_title VARCHAR(100),homepage VARCHAR(100), overview TEXT,
    popularity FLOAT, production_countries VARCHAR(200), release_date DATE,
    revenue BIGINT, runtime FLOAT, spoken_languages VARCHAR(200), vote_average FLOAT, vote_count INTEGER,
    genres_1 VARCHAR(200), genres_2 VARCHAR(200), genres_3 VARCHAR(200), 
    keywords_1 VARCHAR(200), keywords_2 VARCHAR(200), keywords_3 VARCHAR(200)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE UNIQUE INDEX hidx ON movies_hulu(mid);

-- movie poster
CREATE TABLE IF NOT EXISTS movies_poster(
    mid INTEGER, 
    FOREIGN KEY(mid) REFERENCES movies_ott(mid),
    img_src VARCHAR(150)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE UNIQUE INDEX pidx ON movies_poster(mid);

-- korean movie
CREATE TABLE IF NOT EXISTS movies_korean(
    mid INTEGER PRIMARY KEY, release_year INTEGER, original_title VARCHAR(100),
    genres VARCHAR(100), director VARCHAR(100), producer VARCHAR(100), writer VARCHAR(100),
    cast TEXT, crank_in VARCHAR(100), crank_out VARCHAR(100), presents VARCHAR(100), distributor VARCHAR(100), production VARCHAR(100),
    release_data VARCHAR(100), etc TEXT
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE UNIQUE INDEX kidx ON movies_korean(mid);

-- korean movie poster
CREATE TABLE IF NOT EXISTS movies_kor_poster(
    mid INTEGER,
    FOREIGN KEY(mid) REFERENCES movies_korean(mid), img_src VARCHAR(150)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE UNIQUE INDEX kpidx ON movies_kor_poster(mid);

------------------------------------------------------------------------
--------------------------- tables for users ---------------------------
------------------------------------------------------------------------


-- board_db
CREATE TABLE IF NOT EXISTS board_db (
    board_id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title varchar(20) NOT NULL,
    content text NOT NULL,   
    mid INTEGER,
    FOREIGN KEY(mid) REFERENCES movies_ott(mid),
    last_chg_date datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE UNIQUE INDEX bidx ON board_db(board_id);

-- user_db
CREATE TABLE IF NOT EXISTS user_db (
    user_id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_name varchar(20) NOT NULL,
    _password varchar(20) NOT NULL,
    user_email varchar(50) NOT NULL
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE UNIQUE INDEX uidx ON user_db(user_id);

-- user_board
CREATE TABLE IF NOT EXISTS user_board (
    user_id INTEGER NOT NULL,
    board_id INTEGER NOT NULL,
    FOREIGN KEY(user_id) REFERENCES user_db(user_id),
    FOREIGN KEY(board_id) REFERENCES board_db(board_id)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

-- user_fav_db
CREATE TABLE IF NOT EXISTS user_fav_db (
    user_id INTEGER NOT NULL,
    FOREIGN KEY(user_id) REFERENCES user_db(user_id),
    mid TEXT DEFAULT NULL
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

-- user_search_db
CREATE TABLE IF NOT EXISTS user_search_db (
    user_id INTEGER NOT NULL,
    FOREIGN KEY(user_id) REFERENCES user_db(user_id),
    search1 varchar(100), search2 varchar(100), search3 varchar(100), search4 varchar(100), search5 varchar(100)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE UNIQUE INDEX sidx ON user_search_db(user_id);
