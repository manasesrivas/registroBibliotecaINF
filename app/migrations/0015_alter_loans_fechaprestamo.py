# Generated by Django 4.2.5 on 2023-09-28 03:27

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('app', '0014_alter_readers_esdocente'),
    ]

    operations = [
        migrations.AlterField(
            model_name='loans',
            name='fechaPrestamo',
            field=models.DateTimeField(),
        ),
    ]
