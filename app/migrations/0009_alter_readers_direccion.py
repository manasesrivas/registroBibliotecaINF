# Generated by Django 4.2.3 on 2023-07-24 21:23

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('app', '0008_alter_loans_idlibro'),
    ]

    operations = [
        migrations.AlterField(
            model_name='readers',
            name='direccion',
            field=models.TextField(blank=True, max_length=150),
        ),
    ]
