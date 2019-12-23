# Use an official Python runtime as a parent image
FROM python:3

# Set the working directory to /app
WORKDIR /app

# Copy the current directory contents into the container at /app
COPY . /app

# Install any needed packages specified in requirements.txt
RUN pip install --trusted-host pypi.python.org -r py_requirements.txt

# Make port 80 available to the world outside this container
EXPOSE 80 4000

# Define environment variable
ENV NAME World

# Run app.py when the container launches
CMD ["python", "app.py"]

# Apache php server independent of Python
FROM php:7.2-apache
COPY var/www/html /var/www/html/
