from psycopg2 import pool
from dotenv import load_dotenv
import os

load_dotenv()

# Fetch variables
USER = os.getenv("USER")
PASSWORD = os.getenv("PASSWORD")
HOST = os.getenv("HOST")
PORT = os.getenv("PORT")
DBNAME = os.getenv("DB_NAME")

db_pool = pool.SimpleConnectionPool(
    minconn=1,
    maxconn=2,
    user=USER,
    password=PASSWORD,
    host=HOST,
    port=PORT,
    dbname=DBNAME
)

class Cursor:
    def __init__(self, commit=True):
        self._do_commit = commit

    def __enter__(self):
        self.conn = db_pool.getconn()  # pega uma conexão existente do pool
        self.cursor = self.conn.cursor()
        return self.cursor

    def __exit__(self, exc_type, exc_val, exc_tb):
        self.cursor.close()
        self.conn.commit()
        db_pool.putconn(self.conn)  # devolve a conexão ao pool