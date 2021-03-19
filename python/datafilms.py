"""!
	@file datafilms.py
"""


import pandas as pd
import numpy as np



if __name__ == "__main__":
	
	films = pd.read_csv("../../film.csv", sep=';', header=0)
	res = films.to_dict(orient='split')
	columns_name = res['columns']
	datas = res['data']

	# on selectionne 22 lignes
	fl = 12 # indice de la première ligne
	n = 22 # nb lignes à récupérer

	train = datas[fl:fl+n]

# ...