import datetime
import numpy as np
import matplotlib.pyplot as plt
from matplotlib.dates import DayLocator, HourLocator, DateFormatter, drange
import random

initStock = 200
sales = [random.randint(0,10) for i in range(30)]
sales = np.array(sales)

stock = [initStock]
for sale in sales:
	stock.append(stock[-1] - sale)

stock = np.array(stock)[1:]
#date1 = "01/04/2016"
#date2 = "14/04/2016"

date1 = datetime.datetime(2016, 4, 1)
date2 = date1 + datetime.timedelta(days=len(sales))
delta = datetime.timedelta(days=1)
dates = drange(date1, date2, delta)

fig, ax = plt.subplots()

plt.title('Sales for Teddy Bear')
plt.xlabel('Date')
plt.ylabel('Sales')

ax.set_xlim(dates[0], dates[-1])
ax.set_ylim(0, initStock+50)

ax.xaxis.set_major_locator(DayLocator())
ax.xaxis.set_minor_locator(HourLocator(np.arange(0, 25, 6)))
ax.xaxis.set_major_formatter(DateFormatter('%d'))

ax.fmt_xdata = DateFormatter('%Y-%m-%d %H:%M:%S')

fig.autofmt_xdate()
ax.plot_date(dates, stock)

x = np.arange(len(sales))
y = initStock - 5 *x 
m, b = np.polyfit(x, y, 1)

ax.plot_date(dates, m*x + b, '-')

plt.savefig('teddy.png')
plt.show()