install:
	bin/composer install

start:
	php -S localhost:8080

test:
	# cd tst && ../vendor/bin/phpunit
	./vendor/bin/phpunit tst

lint:
	make -i lintmd
	make -i lintcs

lintmd:
	.\vendor\bin\phpmd .\lib ansi codesize,unusedcode,naming
lintcs:
	.\vendor\bin\phpcs --extensions=php .\lib\

dev:
	php -dxdebug.mode=debug -dxdebug.start_with_request=yes -S localhost:8080