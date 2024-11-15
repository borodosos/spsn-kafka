# Настройки пакета

## Конфигурация

`php artisan vendor:publish --tag=spsn-kafka-config` - опубликовать конфиг с настройками

## Команды

`php artisan spsn-kafka:consumer` - запустить консьюмер топиков. Можно запустить локально и смотреть входящие сообщения. Если приложения запускается в докере, то консьюмер запускается автоматически

`php artisan spsn-kafka:make-listener` - создать слушатель события `SpsnKafkaMessageReceived`, которое принимает сообщения из топиков. Если слушатель уже создан или описан другой слушатель этого события, то эту команду не обязательно вводить

Всю логику по работе с сообщениями описывать в слушателе `SpsnKafkaMessageReceived`
