# Generated by Django 4.2 on 2023-04-30 19:37

from django.db import migrations, models


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='AtividadeModel',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('atividade', models.CharField(max_length=50)),
                ('detalhes', models.CharField(max_length=500)),
                ('data', models.DateField()),
            ],
        ),
    ]