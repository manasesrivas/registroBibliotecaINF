# Generated by Django 4.2.3 on 2023-07-16 01:43

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('app', '0005_loans'),
    ]

    operations = [
        migrations.AlterField(
            model_name='readers',
            name='especialidad',
            field=models.CharField(max_length=40),
        ),
    ]