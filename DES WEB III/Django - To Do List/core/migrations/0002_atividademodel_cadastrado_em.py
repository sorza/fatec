# Generated by Django 4.2 on 2023-04-30 19:40

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('core', '0001_initial'),
    ]

    operations = [
        migrations.AddField(
            model_name='atividademodel',
            name='cadastrado_em',
            field=models.DateTimeField(auto_now=True, verbose_name='cadastrado em'),
        ),
    ]
