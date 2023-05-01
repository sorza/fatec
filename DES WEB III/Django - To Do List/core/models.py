from django.db import models

class AtividadeModel(models.Model):
    atividade = models.CharField(max_length=50)
    detalhes = models.CharField(max_length=500)
    data = models.DateField()
    cadastrado_em = models.DateTimeField(
        verbose_name='cadastrado em', 
        auto_now_add=False, auto_now=True
    )

    def __str__(self):
        return self.atividade
    
    class Meta:
        verbose_name_plural = 'Atividades'
        verbose_name = 'Atividade'
        ordering = ('data','cadastrado_em')

