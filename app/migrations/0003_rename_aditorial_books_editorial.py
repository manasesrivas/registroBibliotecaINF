# Generated by Django 4.2.3 on 2023-07-13 06:10

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('app', '0002_alter_readers_numerotelefono'),
    ]

    operations = [
        migrations.RenameField(
            model_name='books',
            old_name='aditorial',
            new_name='editorial',
        ),
    ]