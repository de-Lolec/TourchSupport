# Выкачиваем из dockerhub образ с python версии 3.10
FROM python:3.10
# Устанавливаем рабочую директорию для проекта в контейнере
WORKDIR /python
# Скачиваем/обновляем необходимые библиотеки для проекта
COPY requirements.txt /python
RUN pip3 install --upgrade pip -r requirements.txt
# |ВАЖНЫЙ МОМЕНТ| копируем содержимое папки, где находится Dockerfile,
# в рабочую директорию контейнера
COPY . /python

# Устанавливаем порт, который будет использоваться для сервера
EXPOSE 5000
