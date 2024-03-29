# Generated by Django 4.2.3 on 2023-07-15 08:02

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('app', '0004_alter_books_fechaentrada'),
    ]

    operations = [
        migrations.CreateModel(
            name='Loans',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('idLibro', models.IntegerField()),
                ('idLector', models.IntegerField()),
                ('fechaPrestamo', models.DateTimeField(auto_now_add=True)),
                ('fechaEntrega', models.DateTimeField(null=True)),
                ('estado', models.BooleanField(default=True)),
            ],
        ),
    ]
