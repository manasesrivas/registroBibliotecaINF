# Generated by Django 4.2.5 on 2023-09-28 05:32

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('app', '0016_alter_loans_fechaentrega_alter_loans_fechaprestamo'),
    ]

    operations = [
        migrations.AlterField(
            model_name='loans',
            name='fechaPrestamo',
            field=models.DateField(auto_now_add=True),
        ),
    ]
