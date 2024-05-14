# Use the php:apache as a base image
FROM php:apache

# Set the working directory inside the container
WORKDIR /var/www/html

# Copy the contents of the project directory into the container's working directory
COPY .

# Install the mysqli PHP extension
RUN docker-php-ext-install mysqli 

# Set the command to run Apache with the apache2-foreground command
CMD ["apache2-foreground"]
