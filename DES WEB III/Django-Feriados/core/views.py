from core.models import FeriadoModel
from django.shortcuts import render
import datetime

data = datetime.date.today() 
dia = data.day
mes = data.month

def index(request):    

    context = { 'feriado': FeriadoModel }     

    feriados = FeriadoModel.objects.all()

    for item in feriados:
        if(item.dia == dia and item.mes == mes):
            context['feriado'] = item     

    return render(request, 'index.html', context)
