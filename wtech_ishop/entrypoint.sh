#!/bin/sh

echo "⏳ Waiting for PostgreSQL..."
until pg_isready -h db -p 5432 -U laravel > /dev/null 2>&1; do
  sleep 1
done

echo "🧠 Checking if the database is empty..."

DB_CHECK=$(PGPASSWORD=secret psql -h db -U laravel -d laravel -tAc "SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = 'public';")

if [ "$DB_CHECK" -eq 0 ]; then
  echo "🚀 First-time setup: running migrate:fresh --seed"
  php artisan migrate:fresh --seed --force
else
  echo "✅ Database exists. Running migrate --force"
  php artisan migrate --force
fi

echo "🎉 Starting Laravel on http://0.0.0.0:8000"
php artisan serve --host=0.0.0.0 --port=8000
