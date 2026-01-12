# PHP आणि Apache असलेली इमेज वापरा
FROM php:8.1-apache

# MySQL शी जोडण्यासाठी आवश्यक PHP extensions इंस्टॉल करा
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# तुमचा सर्व कोड कंटेनरमधील Apache च्या वेब डिरेक्टरीमध्ये कॉपी करा
COPY . /var/www/html/

# फाईल परमिशन्स सेट करा (Apache ला वाचता येण्यासाठी)
RUN chown -R www-data:www-data /var/www/html/

# Apache पोर्ट ८० एक्सपोज करा
EXPOSE 80

# Apache सर्व्हर सुरू करा
CMD ["apache2-foreground"]